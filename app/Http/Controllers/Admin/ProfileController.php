<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');

    }// end of getChangeData

    public function update(ProfileRequest $request)
    {
        $input = $request->validated();
        if ($request->file('image')) {
            if (auth()->user()->image != 'users/LOGO.png') {
                delete_file(auth()->user()->getRawOriginal('image'));
            }
            $input['image'] = store_file($request->file('image'), 'admins');
        }
        auth()->user()->update($input);
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->back();

    }// end of postChangeData

}//end of controller
