<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_currencies')->only(['index']);
        $this->middleware('permission:create_currencies')->only(['create', 'store']);
        $this->middleware('permission:update_currencies')->only(['edit', 'update']);
        $this->middleware('permission:delete_currencies')->only(['delete']);

    }// end of __construct
    public function index(){
        $currencies= Currency::latest()->paginate(10);
        return view('admin.currencies.index',compact('currencies'));
    }
    public function create(){
        return view('admin.currencies.create');
    }
    public function store(CurrencyRequest $request){
        Currency::create($request->all());
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.currencies.index');
    }
    public function edit(Currency $currency){
        return view('admin.currencies.edit',compact('currency'));
    }
    public function update(CurrencyRequest $request, Currency $currency){
        $currency->update($request->all());
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.currencies.index');
    }
    public function destroy(Currency $currency){
        $currency->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }
}
