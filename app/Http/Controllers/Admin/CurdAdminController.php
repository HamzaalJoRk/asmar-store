<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurdAdminController extends Controller
{
    public function AddPermissions(Request $request)
    {
        try {
            $admin = Admin::findOrFail($request->admin_id);
            $admin->syncPermissions($request->permissions);
            Alert::success(__('settings.success'), __('site.updated_successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }
}