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
        DB::beginTransaction();
        try {
            $advertisement = Advertisement::firstOrNew(['id' => 1]);
    
            $advertisement->description = $request->description;
            $advertisement->actve = $request->has('actve') ? $request->actve : 0;
            $advertisement->save();
    
            if ($request->hasFile('image')) {
                $advertisement->clearMediaCollection('image');
                $advertisement->addMedia($request->file('image'))->toMediaCollection('image');
            }
    
            DB::commit();
            return redirect()->back()->with('success', 'تم تحديث الإعلان بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in Advertisement Store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ ما، يرجى المحاولة لاحقاً.');
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
