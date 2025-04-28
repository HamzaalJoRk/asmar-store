<?php

namespace App\Services\Providers;

use App\Models\Provider;
use Illuminate\Support\Facades\Http;

abstract class BaseProviderService implements ProviderServiceInterface
{
    protected $provider;
    protected $baseUrl;
    protected $apiKey;
    protected $endpoints;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
        $this->baseUrl = $provider->api_url;
        $this->apiKey = $provider->api_key;
        $this->endpoints = $provider->api_endpoints;
    }

    protected function makeRequest($method, $endpoint, $data = [])
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');
        
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->$method($url, $data);
    }

    protected function incrementTotalRequests()
    {
        $this->provider->increment('total_requests');
    }

    protected function incrementSuccessfulRequests()
    {
        $this->provider->increment('successful_requests');
    }

    protected function incrementFailedRequests()
    {
        $this->provider->increment('failed_requests');
    }
}