<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Level;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create', 'store']);
        $this->middleware('permission:update_users')->only(['edit', 'update']);
        $this->middleware('permission:delete_users')->only(['delete']);

    }// end of __construct


    public function resetBalances()
    {

        // تحديث رصيد كل المستخدمين إلى 0
        User::query()->update(['user_balance' => 0]);

        // \RealRashid\SweetAlert\Facades\Alert::success('تمت العملية', 'تم تصفير جميع الأرصدة بنجاح');
        return redirect()->back();
    }


    public function index()
    {
        $users = User::with('country', 'city', 'currency', 'level')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }// end of index

    public function create()
    {
        $currencys = Currency::get();
        $countries = Country::get();
        $cities = City::get();
        $levels = Level::orderBy('sort')->get();
        return view('admin.users.create', compact('countries', 'cities', 'currencys', 'levels'));
    }// end of create

    public function store(UserRequest $request)
    {
        $input['name'] = $request->name;
        $input['user_name'] = $request->name;
        $input['email'] = $request->email;
        $input['whats_app'] = $request->whats_app;
        $input['is_active'] = $request->is_active;
        $input['currency_id'] = $request->currency_id;
        $input['country_id'] = $request->country_id;
        $input['city_id'] = $request->city_id;
        $input['level_id'] = $request->level_id;
        $input['email_verified_at'] = now();
        $input['password'] = bcrypt($request->password);
        if (request('avatar')) {
            $input['avatar'] = store_file(request('avatar'), 'users');
        }
        $user = User::create($input);
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.users.index');
    }

    public function edit(User $user)
    {
        $currencys = Currency::get();
        $countries = Country::get();
        $cities = City::get();
        $levels = Level::orderBy('sort')->get();
        return view('admin.users.edit', compact('user', 'countries', 'cities', 'currencys', 'levels'));
    }

    public function update(UserRequest $request, User $user)
    {
        $input['name'] = $request->name;
        $input['user_name'] = $request->name;
        $input['email'] = $request->email;
        $input['whats_app'] = $request->whats_app;
        $input['is_active'] = $request->is_active;
        $input['currency_id'] = $request->currency_id;
        $input['country_id'] = $request->country_id;
        $input['user_balance'] = $request->user_balance;
        $input['city_id'] = $request->city_id;
        $input['level_id'] = $request->level_id;
        if (trim($request->password) != '') {
            $input['password'] = bcrypt($request->password);
        }
        if ($request->file('avatar')) {
            if ($user->avatar != 'users/LOGO.png') {
                delete_file($user->getRawOriginal('avatar'));
            }
            $input['avatar'] = store_file($request->file('avatar'), 'users');
        }
        $user->update($input);
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.users.index');
    }

    public function destroy(User $user)
    {
        if ($user->avatar != 'users/LOGO.png') {
            delete_file($user->getRawOriginal('avatar'));
        }
        $user->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }

}
