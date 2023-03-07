<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    //
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Admin/Category/Index', compact('categories'));
    }

    //for showing the creation of Form
    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }

    public function store(Request $request){
        
        $request->validate([
            'category_name' =>'required|string|max:20',
            // 'brand_image' =>'required|file|mimes:jpg,jpeg,png',
        ]);
        $model = new Category();
        
        $model->category_name = $request->category_name;
        $model->save();

        return redirect()->route('category.index');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return inertia::render('Admin/Category/Edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => "required|string|max:20",
        ]);
        $model = Category::findOrFail($id);   
        $model->category_name=$request->category_name;
        $model->save();
        return redirect()->route('category.index');
    }

    public function destroy($id){
        $model = Category::findOrFail($id);
        $model->delete();
        return redirect()->route('category.index');
    }
}
