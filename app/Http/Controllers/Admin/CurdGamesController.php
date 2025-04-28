<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Package;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class CurdGamesController extends Controller
{
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

    public function show($id)
    {
        $game = Game::findorFail($id);
        return view('admin.games.show', compact('game'));
    }

    public function index()
    {
        $games = Game::latest()->paginate(10);
        return view('admin.games.index', compact('games'));
    }
    public function create()
    {
        return view('admin.games.index');
    }

    public function edit($id)
    {
        $game = Game::findorFail($id);
        $providers = \App\Models\Provider::where('is_active', 1)->get();
        return view('admin.games.edit', compact('game', 'providers'));
    }

    public function store(GameRequest $request)
    {
        $data = $request->except('price_qty_package', 'quantity_package', 'is_active_package', 'icon', 'background', 'background_package', 'icon_coins');

        if (!isset($data['need_name_player'])) {
            $data['need_name_player'] = 0;
        }
        if (!isset($data['need_id_player'])) {
            $data['need_id_player'] = 0;
        }
        if (!isset($data['have_packages'])) {
            $data['have_packages'] = 0;
        }
        // Set min_qty from request or default to 1 if not provided
        $data['min_qty'] = $request->min_qty ?? 1;

        DB::beginTransaction();
        try {
            $data['slug'] = Str::slug($data['ar']['title']);
            $game = Game::create($data);
            if ($request->have_packages == 1) {
                $packages = [];
                foreach ($request->price_qty_package as $key => $value) {
                    $packages[] = [
                        'game_id' => $game->id,
                        'price' => $request->price_qty_package[$key],
                        'quantity' => $request->quantity_package[$key],
                        'is_active' => $request->is_active_package[$key],
                    ];
                }
                $game->packages()->createMany($packages);
            }
            if ($request->hasFile('icon')) {
                $game->addMedia($request->file('icon'))->toMediaCollection('icon');
            }
            if ($request->hasFile('background')) {
                $game->addMedia($request->file('background'))->toMediaCollection('background');
            }
            if ($request->hasFile('icon_coins')) {
                $game->addMedia($request->file('icon_coins'))->toMediaCollection('icon_coins');
            }
            if ($request->hasFile('background_package')) {
                $game->addMedia($request->file('background_package'))->toMediaCollection('background_package');
            }



            DB::commit();
            return redirect()
                ->route('ad.games.index')
                ->with('success', 'Game created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', __('translation.same_thing_error'));
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([
            'price_qty_package',
            'quantity_package',
            'is_active_package',
            'icon',
            'background',
            'background_package',
            'old_packages',
            'icon_coins',
            // استثناء حقول الموفر
            'provider_type',
            'provider_id',
            'provider_game_id',
        ]);

        if (!isset($data['need_name_player'])) {
            $data['need_name_player'] = 0;
        }
        if (!isset($data['need_id_player'])) {
            $data['need_id_player'] = 0;
        }
        if (!isset($data['have_packages'])) {
            $data['have_packages'] = 0;
        }

        $game = Game::findorFail($id);
        $type = $request->provider_type;

        // dd($type);
        if ($type === 'auto') {
            $game->provider_id = $request->provider_id;
            $game->provider_game_id = $request->provider_game_id;
        } else {
            $game->provider_id = null;
            $game->provider_game_id = null;
        }

        DB::beginTransaction();
        try {

            $data['slug'] = Str::slug($data['ar']['title']);



            $game->update($data);

            if ($request->old_packages) {
                Package::where('game_id', $game->id)->whereNotin('id', $request->old_packages)->delete();

            } else {
                Package::where('game_id', $game->id)->delete();
            }

            if ($request->have_packages == 1 && $request->price_qty_package) {
                foreach ($request->price_qty_package as $key => $value) {
                    $packages = [
                        'game_id' => $game->id,
                        'price' => $request->price_qty_package[$key],
                        'quantity' => $request->quantity_package[$key],
                        'is_active' => $request->is_active_package[$key],
                    ];
                    if ($request->old_packages) {
                        if (!array_key_exists($key, $request->old_packages)) {
                            Package::create($packages);
                        } else {
                            Package::where('id', $request->old_packages[$key])->update($packages);
                        }
                    } else {
                        Package::create($packages);
                    }


                }
            }

            if ($request->hasFile('icon')) {
                $game->clearMediaCollection('icon');
                $game->addMedia($request->file('icon'))->toMediaCollection('icon');
            }
            if ($request->hasFile('background')) {
                $game->clearMediaCollection('background');
                $game->addMedia($request->file('background'))->toMediaCollection('background');
            }
            if ($request->hasFile('icon_coins')) {
                $game->clearMediaCollection('icon_coins');

                $game->addMedia($request->file('icon_coins'))->toMediaCollection('icon_coins');
            }
            if ($request->hasFile('background_package')) {
                $game->clearMediaCollection('background_package');

                $game->addMedia($request->file('background_package'))->toMediaCollection('background_package');
            }
            DB::commit();
            return redirect()->route('ad.games.index')->with('success', 'Game updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()->back()->with('error', __('translation.same_thing_error'));

        }
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $game = Game::findOrFail($id);

    //         $rules = [
    //         ];

    //         foreach (config('translatable.locales') as $locale) {
    //             $rules[$locale . '.title'] = 'required|string|max:255';
    //             $rules[$locale . '.keywords'] = 'required|string';
    //             $rules[$locale . '.name_currency'] = 'required|string';
    //         }

    //         $validator = Validator::make($request->all(), $rules);
    //         if ($validator->fails()) {
    //             return redirect()
    //                 ->back()
    //                 ->withErrors($validator)
    //                 ->withInput();
    //         }

    //         if ($request->provider_type === 'auto') {
    //             $game->provider_id = $request->provider_id;
    //             $game->provider_game_id = $request->provider_game_id;
    //         } else {
    //             $game->provider_id = null;
    //             $game->provider_game_id = null;
    //         }

    //         foreach (config('translatable.locales') as $locale) {
    //             $game->translateOrNew($locale)->title = $request->{$locale}['title'];
    //             $game->translateOrNew($locale)->keywords = $request->{$locale}['keywords'];
    //             $game->translateOrNew($locale)->name_currency = $request->{$locale}['name_currency'];
    //         }

    //         if ($request->hasFile('icon')) {
    //             $game->addMedia($request->file('icon'))->toMediaCollection('icon');
    //         }
    //         if ($request->hasFile('background')) {
    //             $game->addMedia($request->file('background'))->toMediaCollection('background');
    //         }
    //         if ($request->hasFile('icon_coins')) {
    //             $game->addMedia($request->file('icon_coins'))->toMediaCollection('icon_coins');
    //         }
    //         if ($request->hasFile('background_package')) {
    //             $game->addMedia($request->file('background_package'))->toMediaCollection('background_package');
    //         }

    //         $game->save();

    //         alert()->success('Success', __('site.updated_successfully'));
    //         return redirect()->route('ad.games.index');
    //     } catch (\Exception $e) {
    //         alert()->error('Error', $e->getMessage());
    //         return redirect()
    //             ->back()
    //             ->withInput();
    //     }
    // }

    public function destroy($id)
    {
        $game = Game::findorFail($id);
        $game->delete();
        return redirect()
            ->route('ad.games.index')
            ->with('success', 'Game deleted successfully.');
    }

    public function packages($id)
    {
        $packages = Game::find($id)->packages;

        return view('admin.games.packages', compact('packages'));
    }
    public function packagesUpdate(Request $request, $id)
    {
        $data = $request->all();
        $game = Game::findorFail($data['id']);

        $game
            ->packages()
            ->where('id', $id)
            ->update([
                'price' => $data['price_qty_package'],
                'quantity' => $data['quantity_package'],
                'is_active' => $data['is_active_package'],
            ]);

        return redirect()
            ->back()
            ->with('success', 'Game package updated successfully.');
    }
    public function packagesDestroy(Request $request, $id)
    {
        $game = Game::findorFail($request->id);
        $game
            ->packages()
            ->where('id', $id)
            ->delete();
        $game->clearMediaCollection('background_package');

        if (count($game->packages) > 0) {
            $game->update([
                'have_packages' => 1,
            ]);
        } else {
            $game->update([
                'have_packages' => 0,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Game package deleted successfully.');
    }
}
