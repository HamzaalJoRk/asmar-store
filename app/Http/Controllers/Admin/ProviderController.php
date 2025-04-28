<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_providers')->only(['index']);
        $this->middleware('permission:create_providers')->only(['create', 'store']);
        $this->middleware('permission:update_providers')->only(['edit', 'update']);
        $this->middleware('permission:delete_providers')->only(['delete', 'destroy']);
    }

    public function index()
    {
        $providers = Provider::latest()->paginate(10);
        return view('admin.providers.index', compact('providers'));
    }

    public function create()
    {
        return view('admin.providers.create');
    }

    public function store(ProviderRequest $request)
    {
        $provider = Provider::create($request->validated());

        if ($request->hasFile('logo')) {
            $provider->addMedia($request->file('logo'))
                    ->toMediaCollection('logo');
        }

        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.providers.index');
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

        if ($request->hasFile('logo')) {
            $provider->clearMediaCollection('logo');
            $provider->addMedia($request->file('logo'))
                    ->toMediaCollection('logo');
        }

        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.providers.index');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }

    public function fetchProducts(Request $request)
    {
        $provider = Provider::find($request->provider);
        if (!$provider) {
            return response()->json(['error' => 'Provider not found'], 404);
        }

        try {
            $apiUrl = '';
            $token = $provider->api_token;
            
            switch ($provider->name) {
                case 'Elexellans':
                    $apiUrl = 'https://api.elexellans.com.tr/client/api/products';
                    break;
                case 'YamanPay':
                    $apiUrl = 'https://api.yaman-pay.com/client/api/products';
                    break;
                case 'saud':
                    $apiUrl = 'https://api.saud-card.com/client/api/products';
                    break;
                default:
                    return response()->json(['error' => 'Provider API not configured'], 400);
            }

            $response = Http::withHeaders([
                'api-token' => $provider->api_key,
            ])->get($apiUrl);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => $response], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
