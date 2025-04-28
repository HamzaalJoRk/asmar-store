<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_cities')->only(['index']);
        $this->middleware('permission:create_cities')->only(['create', 'store']);
        $this->middleware('permission:update_cities')->only(['edit', 'update']);
        $this->middleware('permission:delete_cities')->only(['delete']);

    }// end of __construct
    public function index(){
        $cities= City::with('country')->orderBy('sort')->paginate(10);
        return view('admin.cities.index',compact('cities'));
    }
    public function create(){
        $countries = Country::get();
        return view('admin.cities.create',compact('countries'));
    }
    public function store(CityRequest $request){
        City::create($request->all());
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.cities.index');
    }
    public function edit(City $city){
        $countries = Country::get();
        return view('admin.cities.edit',compact('city','countries'));
    }
    public function update(CityRequest $request, City $city){
        $city->update($request->all());
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.cities.index');
    }
    public function destroy(City $city){
        $city->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }
}
