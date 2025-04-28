<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_levels')->only(['index']);
        $this->middleware('permission:create_levels')->only(['create', 'store']);
        $this->middleware('permission:update_levels')->only(['edit', 'update']);
        $this->middleware('permission:delete_levels')->only(['delete']);

    }// end of __construct
    public function index(){
        $levels= Level::latest()->paginate(10);
        return view('admin.levels.index',compact('levels'));
    }
    public function create(){
        return view('admin.levels.create');
    }
    public function store(LevelRequest $request){
        // dd('dd');
        $input = $request->validated();
        if (request('image')) {
            $input['image'] = store_file(request('image'), 'levels');
        }
        level::create($input);
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.levels.index');
    }
    public function edit(Level $level){
        return view('admin.levels.edit',compact('level'));
    }
    public function update(LevelRequest $request, Level $level){
        $input = $request->validated();
         if ($request->file('image')) {
            if ($level->image != 'levels/LOGO.png') {
                delete_file($level->getRawOriginal('image'));
            }
            $input['image'] = store_file($request->file('image'), 'levels');
        }
        $level->update($input);
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.levels.index');
    }
    public function destroy(Level $level){
        if ($level->image != 'levels/LOGO.png') {
            delete_file($level->getRawOriginal('image'));
        }
        $level->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }
}
