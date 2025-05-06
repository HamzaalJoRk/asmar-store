<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_settings')->only(['index']);
        $this->middleware('permission:create_settings')->only(['create', 'store']);
        $this->middleware('permission:update_settings')->only(['edit', 'update']);
        $this->middleware('permission:delete_settings')->only(['delete']);

    }// end of __construct
    public function general()
    {
        $currencys = Currency::get();
        $config_languages = config('constants.langs');
        $languages = [];
        foreach ($config_languages as $key => $value) {
            $languages[$key] = $value['full_name'];
        }
        $timezone_list = $this->allTimeZones();
        return view('admin.settings.general',compact('currencys','languages','timezone_list'));

    }// end of index

    public function store(Request $request)
    {
        $request->validate([
            'website_name' => 'required|string|max:10',
            'title' => 'required',
            'email' => 'sometimes|nullable|email',
            'logo' => 'sometimes|nullable',
            'description_bar' => 'sometimes|nullable',
            'fav_icon' => 'sometimes|nullable',
            'link' => 'nullable',
            'website_active' => 'required|boolean',
            'keywords' => 'nullable',
            'description' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'language' => 'nullable',
            'timezone' => 'nullable',
            'currency_id' => 'required',
            'whatsup' => 'sometimes|nullable|url',
            'telegram' => 'sometimes|nullable|url',
        ]);

        $data = $request->except(['_token', '_method','telegram', 'whatsup','logo','fav_icon']);
        if($request->logo){
            delete_file(setting('logo'));
            $data['logo']=store_file($request->logo,'settings');
        }else{
            $data['logo']=setting('logo');
        }
        if($request->fav_icon){
            delete_file(setting('fav_icon'));
            $data['fav_icon']=store_file($request->fav_icon,'settings');
        }else{
            $data['fav_icon']=setting('fav_icon');
        }
        if ($request->telegram) {
            $data['telegram'] = $request->telegram;
        }
        if ($request->whatsup) {
            $data['whatsup'] = $request->whatsup;
        }
        setting($data)->save();
        Alert::success(__('settings.success'), __('settings.editsms'));
        return redirect()->back();
    }// end of store


    public function allTimeZones()
    {
        $timezones = [];
        foreach (timezone_identifiers_list() as $key => $zone) {
            $timezone = timezone_open($zone);

            $datetime_eur = date_create("now", timezone_open("Europe/London"));
            $gmt_offset = timezone_offset_get($timezone, $datetime_eur);
            $offset = $this->convertToHoursMins($gmt_offset);
            if ($gmt_offset > 0) {
                $timezones[$zone] = $zone . ' (GMT +' . $offset . ')';
            } else if ($gmt_offset < 0) {
                $timezones[$zone] = $zone . ' (GMT ' . $offset . ')';
            } else {
                $timezones[$zone] = $zone . ' (GMT +00:00)';
            }
        }
        return $timezones;
    }
    function convertToHoursMins($time)
    {
        $hours = floor($time / 3600);
        $x = $time / 3600;
        $remain_nimutes = $x - floor($x);;
        $minutes = ($remain_nimutes * 60);
        return $hours . ':' . str_pad($minutes, 2, "0");;
    }
}//end of controller


