<?php

namespace App\Services\Providers;

interface ProviderServiceInterface
{
    public function placeOrder($order);
    public function checkOrderStatus($order);
    public function getGameDetails($gameId);
    public function validateGameConfiguration($gameId, $params);
}