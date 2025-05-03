<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        // رفع الصورة
        $data['image'] = $request->file('image')->store('categories', 'public');
        Category::create($data);

        Alert::success(__('settings.success'), __('categories.created'));
        return redirect()->route('ad.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($category->image);
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        Alert::success(__('settings.success'), __('categories.updated'));
        return redirect()->route('ad.categories.index');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category->image);
        $category->delete();

        Alert::success(__('settings.success'), __('categories.deleted'));
        return redirect()->back();
    }
}
