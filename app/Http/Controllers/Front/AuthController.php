<?php

namespace App\Http\Controllers\Front;

use App\CPU\Helpers;
use App\CPU\SMS_module;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ProfileRequest;
use App\Mail\PasswordResetMail;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Game;
use App\Models\Level;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function App\CPU\translate;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
      $currencies=  Currency::get();
        return view('auth.register',compact('currencies'));
    }
    public function loginPost (Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required|min:3'
        ]);
        $User = User::where('email', $request->user_name)->first();
        // dd($User);
        // dd($User->password, $request->password, Hash::check($request->password, $User->password));

        if($User){
            if (!$User->is_active ){
                return redirect()->back()->withErrors('is not active');

            }
            if (auth()->attempt(['email' => $request->user_name, 'password' => $request->password], $request->remember)) {
                return redirect()->route('front.index');
            }
        }
        return redirect()->back()->withErrors('Credentials does not match.');
    }

    public function registerPost (Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,user_name',
            'email' => 'required|email|unique:users',
            'currency_id' => 'required',
            'password' => 'required|min:3|confirmed'
        ]);
        User::create([
            'user_name' => $request['username'],
            'email' => $request['email'],
            'currency_id' =>$request['currency_id'],
            'password' => bcrypt($request['password']),
        ]);
        auth()->attempt(['user_name' => $request->username, 'password' => $request->password]);
        return redirect(route('front.index'));
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
    public function completeRegister()
    {
        if(Auth::check()){
            if(Auth::user()->whats_app != null) {
                return redirect()->route('front.index');
            }
        }
        $countries=Country::orderBy('sort')->get();
        return view('auth.complete',compact('countries'));
    }

    public function completeRegisterStore(Request $request)
    {
        $request->validate([
            'user_whatsapp' => 'required|numeric',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
            'city' => 'required|max:100',
            'address' => 'required|max:200'
        ]);
        try {
            $user=auth()->user();

            $user->update([
                'whats_app'=>$request->user_whatsapp,
                'country_id'=>$request->country_id,
                'city_id'=>$request->city_id,
                'area'=>$request->city,
                'address'=>$request->address,
            ]);
            return redirect()->route('front.index');
        } catch (\Exception $e) {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()->back()->withErrors('same_thing_error');

        }
    }

    public function accountLevel()
    {
        $user_level= auth()->user()->level;
        $levels=Level::orderBy('sort')->get();
        return view('front.accountlevel',compact('levels','user_level'));
    }
    public function myProfile()
    {
        $user=\auth()->user();
        $currencies=  Currency::get();
        $countries=Country::orderBy('sort')->get();
        $cities=City::where('country_id',$user->country_id)->orderBy('sort')->get();

        return view('front.profile.edit',compact('user','currencies','cities','countries'));
    }
    public function PostMyProfile(ProfileRequest $request)
    {
        $user = \auth()->user();
        DB::beginTransaction();
        try {
            $input = [
                'user_name' => $request->username,
                'email' => $request->email,
                'currency_id' =>$request->currency_id,
                'whats_app'=>$request->user_whatsapp,
                'country_id'=>$request->country_id,
                'city_id'=>$request->city_id,
                'area'=>$request->city,
                'address'=>$request->address,
            ];

            if ($request->file('image')) {
                if (auth()->user()->avatar) {
                    delete_file(auth()->user()->getRawOriginal('image'));
                }
                $input['avatar'] ='uploads\\'. store_file($request->file('image'), 'users');
            }

            $user->update($input);
            DB::commit();
            return redirect()->back()->with('message', __('translation.edit_s_profile'));

        } catch (\Exception $e) {

            DB::rollBack();
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()->back()->with(['error_m' => __('translation.same_thing_error')]);

        }
    }
    public function reset()
    {
        return view('auth.passwords.email');
    }
    public function resetPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        DB::table('password_resets')
            ->where('email', $request['email'])
            ->delete();

            $customer = User::Where(['email' => $request['email']])->first();
            if (isset($customer)) {
                $token = Str::random(120);

                DB::table('password_resets')->insert([
                    'email' => $customer['email'],
                    'token' => $token,
                    'created_at' => now()
                ]);
                $reset_url = url('/') . '/reset-password?token=' . $token;
                Mail::to($customer['email'])->send(new PasswordResetMail($reset_url));
                return back()->withsuccess(__('translation.Check your email. Password reset url sent.'));
            }


        return back()->withErrors(__('translation.No such user found!'));
    }
    public function resetPassword(Request $request)
    {
        $data = DB::table('password_resets')
            ->where(['token' => $request['token']])
            ->first();

        if (isset($data)) {
            $token = $request['token'];
            return view('auth.passwords.reset', compact('token'));
        }
        return redirect()->route('front.index')->withErrors(__('translation.Invalid data'));
   }
    public function resetSubmitPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3|confirmed'
        ]);
        $data = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if (isset($data)) {
            User::where('email',$data->email)
                ->update([
                    'password' =>bcrypt($request['password'])
                ]);
            DB::table('password_resets')
                ->where(['token' => $request['token']])
                ->delete();
            return redirect()->route('login')
                ->withsuccess(__('translation.Password reset successfully.'));
        }
        return back()->withErrors(__('translation.Invalid data'));
    }
}
