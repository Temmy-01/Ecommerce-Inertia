<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;


class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::all();
        return Inertia::render('Admin/Brands/Index', compact('brands'));
    }

    //for showing the creation of Form
    public function create()
    {
        return Inertia::render('Admin/Brands/Create');
    }

    public function store(Request $request){
        
        $request->validate([
            'brand_name' =>'required|string|max:10',
            'brand_image' =>'required|image|mimes:jpg,jpeg,png',
        ]);
        $model = new Brand();
        
        
        if($request->brand_image){
            $model->image = $request->file('brand_image')->store('images/brand', 'public' );
        }
        $model->brand_name = $request->brand_name;
        $model->save();

        return redirect()->route('brand.index');
    }

    public function edit($id){
        $brand = Brand::findOrFail($id);
        return inertia::render('Admin/Brands/Edit', compact('brand'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'brand_name' => "required|string|max:10",
        ]);
        $model = Brand::findOrFail($id);
        if($request -> hasFile('brand_image')){
            $model->image = $request->file('brand_image')->store('images/brand', 'public');
        }   
        $model->brand_name=$request->brand_name;
        $model->save();
        return redirect()->route('brand.index');
    }

    public function destroy($id){
        $model = Brand::findOrFail($id);
        if(!empty($model->image)){
            Storage::delete("public/" . $model->image);
        }
        $model->delete();
        return redirect()->route('brand.index');
    }
}
