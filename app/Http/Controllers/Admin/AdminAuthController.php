<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function form_login(){
        return view('admin.auth.login');
    }
    public function loginAdmin(Request $request){


        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $Admin = Admin::where('email', $request->email)->first();

        if($Admin){
            if (!$Admin->status ){
                return redirect()->back()->withErrors(['is not active']);

            }
            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                return redirect()->route('ad.index');

            }
        }
        return redirect()->back()->withErrors(['Credentials does not match.']);
    }



    public function logout(){
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
