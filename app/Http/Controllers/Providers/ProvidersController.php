<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class providersController extends Controller
{
    public static function getToken($providerName)
    {
        $provider = Provider::where('name', $providerName)->first();
        if ($provider) {
            return $provider->api_key;
        } else {
            return null; // or handle the error as needed
        }
    }

    public static function soud($game, $req, $token)
    {
        $url = 'https://api.soud-card.com/client/api/newOrder/' . $game->provider_game_id . '/params';
        $parameters = [
            'qty' => $req->qty,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->playerid,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    
    }

    // Add other provider methods here

    public static function lifecash($product, $req, $token, $order)
    {
        $url = 'https://api.life-cash.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function masar($product, $req, $token)
    {
        $url = 'https://api.masar-card.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function ap4stor($product, $req, $token, $order)
    {
        $url = 'https://api.ap4stor.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function elexellans($product, $req, $token, $order)
    {
        $url = 'https://api.elexellans.com.tr/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function xp($product, $req, $token, $order)
    {
        $url = 'https://api.xp4card.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function lord($product, $req, $token, $order)
    {
        $url = 'https://www.lord1.cash/api/APIs/RequestOrder';
        $parameters = [
            'API' => $token,
            'email' => "aaasyraaa@gmail.com",
            'productId' => $product->source_id,
            'amount' => $req->quantity,
            'playernumber' => $req->player_id,
            'playername' => "a",
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('code') === 1) {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function mzg($product, $req, $token, $order)
    {
        $url = 'https://app.m-z-g.com/api/v2/orders/request-order';
        $payload = [
            'product_id' => $product->source_id,
            'user_id' => $req->player_id,
            'quantity' => $req->quantity,
        ];

        $headers = [
            'User-Agent' => 'Your User Agent String',
            'm-z-g' => 'di-p.com',
            'Authorization' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->post($url, $payload);

        // Get the response status code
        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => false];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function quick($product, $req, $token, $order)
    {
        $url = 'https://api.quick4store.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);

        // Get the response status code
        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => false];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function almlok($product, $req, $token, $order)
    {
        $url = 'https://api.almlok.com/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => $req->uuid,
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);

        // Get the response status code
        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => false];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function speed($product, $req, $token, $order)
    {
        $url = 'https://api.speedcard.vip/client/api/newOrder/' . $product->source_id . '/params';
        $parameters = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $parameters);
        if ($response->successful() && $response->json('status') === 'OK') {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function alborak($product, $req, $token, $order)
    {
        $url = 'https://api.alborakshop.com/client/api/newOrder/' . $product->source_id . '/params';
        $payload = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];
        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $payload);

        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function barkat($product, $req, $token, $order)
    {
        $url = 'https://api.barakat-store.com/client/api/newOrder/' . $product->source_id . '/params';
        $payload = [
            'qty' => $req->quantity,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->player_id,
        ];
        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->get($url, $payload);

        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function jawaker($product, $req, $token, $order)
    {
        $response = Http::asForm()
            ->withHeaders([
                'api_key' => $token, // Replace with your actual API key
            ])
            ->post('https://public.api.royal4cards.com/orders', [
                'playerId' => $req->player_id,
                'tokens' => $req->quantity,
            ]);

        // Get the response status code
        $status = $response->status();
        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }

    public static function kingdoom($product, $req, $token, $order)
    {
        $url = 'https://thekingdoom.com/api/new_order';
        $payload = [
            'quantity' => $req->quantity,
            'product_id' => $product->source_id,
            'player_id' => $req->player_id,
        ];

        $headers = [
            'token' => $token,
        ];

        $response = Http::withHeaders($headers)->post($url, $payload);

        // Get the response status code
        $status = $response->status();

        if ($response->successful()) {
            return ["success" => true, "res" => $response, "withPrice" => true];
        } else {
            return ["success" => false, "res" => $response, "withPrice" => false];
        }
    }
    
}
