<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubCategoryController extends Controller
{
    public function index(){
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('admin.sub_category.index', compact('subCategories','categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name'
        ]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name);
        $subcategory->save();

        return redirect()->back()->with('success', 'Subcategory created successfully');
    }
}
