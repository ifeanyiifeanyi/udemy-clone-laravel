<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories' ));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category();

        if ($request->hasFile('image')) {


            $thumb = $request->file('image');
            $extension = $thumb->getClientOriginalExtension();
            $categoryImage = time() . "." . $extension;
            $thumb->move('admin/category/', $categoryImage);
            $category->image = 'admin/category/' . $categoryImage;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category)
    {
        $categories = Category::all();
        $categoryEdit = Category::findOrFail($category);
        return view('admin.category.index', compact('categoryEdit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->saveCategory($category, $request);

        return redirect()->route('admin.category')->with('success', 'Category updated successfully!');
    }
    private function saveCategory(Category $category, Request $request)
    {
        if ($request->hasFile('image')) {
            if ($category->image) {
                unlink(public_path($category->image));

                // Storage::delete($category->image);
            }
            $imagePath = $request->file('image')->store('admin/category', 'public');
            $category->image = $imagePath;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        Category::findOrFail($category)->delete();
        return redirect()->route('admin.category')->with('success', 'Category deleted successfully!');
    }
}
