<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Game;
use App\Services\Providers\BaseProviderService;
use Illuminate\Support\Facades\Log;

class GameOrderService
{
    public function processOrder(Order $order)
    {
        try {
            // إذا كانت اللعبة مرتبطة بمزود
            if ($order->game->provider_id) {
                return $this->processProviderOrder($order);
            }
            
            // إذا لم تكن مرتبطة بمزود، قم بمعالجة الطلب بشكل عادي
            return $this->processRegularOrder($order);
        } catch (\Exception $e) {
            Log::error('Error processing order: ' . $e->getMessage(), [
                'order_id' => $order->id,
                'exception' => $e
            ]);
            throw $e;
        }
    }

    protected function processProviderOrder(Order $order)
    {
        $game = $order->game;
        $provider = $game->provider;
        
        // إنشاء مثيل من خدمة المزود المناسبة
        $providerService = $this->resolveProviderService($provider);
        
        // تحديث حالة الطلب إلى قيد المعالجة
        $order->update(['status' => 'pending']);
        
        // إرسال الطلب إلى المزود
        $response = $providerService->placeOrder($order);
        
        // تحديث معلومات المزود في الطلب
        $order->update([
            'provider_id' => $provider->id,
            'provider_order_id' => $response['order_id'] ?? null,
            'provider_response' => $response,
            'provider_processed_at' => now(),
            'status' => $response['status'] ?? 'pending'
        ]);

        return $order;
    }

    protected function processRegularOrder(Order $order)
    {
        // معالجة الطلب العادي (بدون مزود)
        $order->update(['status' => 'pending']);
        return $order;
    }

    protected function resolveProviderService($provider)
    {
        $serviceClass = "App\\Services\\Providers\\" . ucfirst($provider->slug) . "Service";
        
        if (!class_exists($serviceClass)) {
            throw new \Exception("Provider service not found for: " . $provider->slug);
        }
        
        return new $serviceClass($provider);
    }
}