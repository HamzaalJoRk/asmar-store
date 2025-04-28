<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\User;
use App\Models\Provider;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule
        ->call(function () {
            $orders = Order::whereNotNull('provider_order_id')
                ->where("status", "pending")
                ->orderBy('created_at', 'desc')
                ->take(200)
                ->get();

            foreach ($orders as $key => $order) {
                $baseRoute = [
                    "soud" => 'https://api.saud-card.com/client/api/check?orders=[' . $order->order_id . ']',
                ];
                $user = User::find($order->user_id);
                $url = $baseRoute[$orderProvider];
                // return $url;
                $token = provider::where('name', $orderProvider)->first('token')->token;
                $headers = [
                    'api-token' => $token,
                ];

                $response = Http::withHeaders($headers)->get($url);
                $newStatus = $response['data'][0]['status'];

                 if ($newStatus === 'accept') {
                    $order->update([
                        'status' => 'approved',
                        'provider_response' => $response,
                        'provider_processed_at' => now(),
                    ]);
                } elseif ($newStatus === 'reject') {
                    $order->update([
                        'status' => 'canceled',
                        'provider_response' => $response,
                        'provider_processed_at' => now(),
                    ]);
                    $final_total = $order->final_total;
                    $user=$order->user_c;
                    $user->update([
                        'amount_orders' => $user->amount_orders - $final_total,
                        'user_balance' => $user->user_balance + $final_total,
                    ]);
                }
            }
        })
        ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
