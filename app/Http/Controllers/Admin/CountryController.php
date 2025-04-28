<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_countries')->only(['index']);
        $this->middleware('permission:create_countries')->only(['create', 'store']);
        $this->middleware('permission:update_countries')->only(['edit', 'update']);
        $this->middleware('permission:delete_countries')->only(['delete']);

    }// end of __construct
    public function index(){
        $countries= Country::orderBy('sort')->paginate(10);
        return view('admin.countries.index',compact('countries'));
    }
    public function create(){
        return view('admin.countries.create');
    }
    public function store(CountryRequest $request){
        Country::create($request->all());
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.countries.index');
    }
    public function edit(Country $country){
        return view('admin.countries.edit',compact('country'));
    }
    public function update(CountryRequest $request, Country $country){
        $country->update($request->all());
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.countries.index');
    }
    public function destroy(Country $country){
        $country->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }
}
