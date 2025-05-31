<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisement = Advertisement::first();
        return view('admin.settings.advertisements', compact('advertisement'));
    }

    public function store(Request $request)
    {
        try {
            // حفظ ملف اللوغو إذا تم رفعه
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('settings', 'public');
                setting(['logo' => $path])->save();
            }

            // حفظ ملف الفافيكون إذا تم رفعه
            if ($request->hasFile('fav_icon')) {
                $path = $request->file('fav_icon')->store('settings', 'public');
                setting(['fav_icon' => $path])->save();
            }

            // حفظ باقي الإعدادات كقيم نصية
            setting([
                'website_name' => $request->input('website_name'),
                'title' => $request->input('title'),
                'link' => $request->input('link'),
                'website_active' => $request->input('website_active'),
                'keywords' => $request->input('keywords'),
                'email' => $request->input('email'),
                'whatsup' => $request->input('whatsup'),
                'telegram' => $request->input('telegram'),
                'description' => $request->input('description'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
                'currency_id' => $request->input('currency_id'),
                'language' => $request->input('language'),
                'timezone' => $request->input('timezone'),
            ])->save();

            return redirect()->back()->with('success', 'تم حفظ الإعدادات بنجاح.');
        } catch (\Exception $e) {
            \Log::error('Error saving settings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء حفظ الإعدادات.');
        }
    }



    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()
            ->back()
            ->with('success', 'تم حذف الإعلان بنجاح.');
    }
}
