<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    //
    
    
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Admin/Products/Index', compact('products'));
    }

    //for showing the creation of Form
    public function create()
    {
        return Inertia::render('Admin/Products/Create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' =>'required|string|max:100',
            'description' =>'required|string',
            'qty' =>'required|integer',
            'price' =>'required|integer',
            'sale_price' =>'required|integer',
            'image' =>'required|image|mimes:jpg,jpeg,png',
        ]);
        $model = new Product();
        
        
        if($request->image){
            $model->image = $request->file('image')->store('images/product', 'public' );
        }
        $model->name = $request->name;
        $model->description = $request->description;
        $model->qty = $request->qty;
        $model->price = $request->price;
        $model->sale_price = $request->sale_price;
        $model->save();

        return redirect()->route('product.index');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return inertia::render('Admin/Products/Edit', compact('product'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' =>'required|string|max:100',
            'description' =>'required|string',
            'qty' =>'required|integer',
            'price' =>'required|integer',
            'sale_price' =>'required|integer',
        ]);
        $model = Product::findOrFail($id);
        if($request -> hasFile('image')){
            $model->image = $request->file('image')->store('images/product', 'public');
        }   
        $model->name = $request->name;
        $model->description = $request->description;
        $model->qty = $request->qty;
        $model->price = $request->price;
        $model->sale_price = $request->sale_price;
        $model->save();
        return redirect()->route('product.index');
    }

    public function destroy($id){
        $model = Product::findOrFail($id);
        if(!empty($model->image)){
            Storage::delete("public/" . $model->image);
        }
        $model->delete();
        return redirect()->route('product.index');
    }
}
