<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    protected $models =
    [
     'admins','users','settings','transactions',
     'banks','levels','games','currencies','countries','cities','agents','orders'
    ];
    protected $permissionMaps = ['create', 'read', 'update', 'delete'];
    public function __construct()
    {
        $this->middleware('permission:read_admins')->only(['index']);
        $this->middleware('permission:create_admins')->only(['create', 'store']);
        $this->middleware('permission:update_admins')->only(['edit', 'update']);
        $this->middleware('permission:delete_admins')->only(['delete']);

    }// end of __construct
    public function index()
    {
        $admins = Admin::where('id', '<>', auth()->id())->latest()->paginate(10);
        return view('admin.admins.index',compact('admins'));
    }// end of index
    public function create(){
        $models=$this->models;
        $permissionMaps=$this->permissionMaps;
        return view('admin.admins.create',compact('models','permissionMaps'));
    }// end of create
    public function store(AdminRequest $request)
    {
        // dd($request->all());
        // try{
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['phone'] = $request->phone;
            $input['status'] = $request->status;
            $input['email_verified_at'] = now();
            $input['password'] = bcrypt($request->password);
            if (request('image')) {
                $input['image'] = store_file(request('image'), 'admins');
            }
            $admin=Admin::create($input);
            $admin->syncPermissions($request->permissions);
            Alert::success(__('settings.success'), __('createsms'));
            return redirect()->route('ad.admins.index');
        // }
        // catch(\Exception $e){
        //     return redirect()->back()->with('error',$e->getMessage());
        // }
    }

    public function edit(Admin $admin)
    {
        $models=$this->models;
        $permissionMaps=$this->permissionMaps;
        return view('admin.admins.edit',compact('admin','models','permissionMaps'));
    }


    public function update(AdminRequest $request, Admin $admin)
    {
        $input = $request->except(['password','password_confirmation','permissions']);
        $input['name'] = $request->name;
        $input['status'] = $request->status;
        $input['email'] = $request->email;
        $input['phone'] = $request->phone;
        if(trim($request->password) != ''){
            $input['password'] = bcrypt($request->password);
        }
        if ($request->file('image')) {
            if ($admin->image != 'admins/LOGO.png') {
                delete_file($admin->getRawOriginal('image'));
            }
            $input['image'] = store_file($request->file('image'), 'admins');
        }
        $admin->update($input);
        $admin->syncPermissions($request->permissions);
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.admins.index');
    }

    public function destroy(Admin $admin)
    {
        if ($admin->image != 'admins/LOGO.png') {
            delete_file($admin->getRawOriginal('image'));
        }
        $admin->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }

}
