<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SliderController extends Controller
{
    
    //For showing the table
    public function index()
    {
        $sliders = Slider::all();
        return Inertia::render('Admin/Slider/Index', compact('sliders'));
    }

    //for showing the creation of Form
    public function create()
    {
        return Inertia::render('Admin/Slider/Create');
    }

    public function store(Request $request){
        
        $request->validate([
            'slider_position' =>'required|numeric|max:10',
            'slider_image' =>'required|image|mimes:jpg,jpeg,png',
        ]);
        $model = new Slider();
        
        
        if($request->slider_image){
            $model->image = $request->file('slider_image')->store('images/slider', 'public' );
        }
        $model->position = $request->slider_position;
        $model->save();

        return redirect()->route('slider.index');
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return inertia::render('Admin/Slider/Edit', compact('slider'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'slider_position' => "required|numeric|max:10",
        ]);
        $model = Slider::findOrFail($id);
        if($request -> hasFile('slider_image')){
            $model->image = $request->file('slider_image')->store('images/slider', 'public');
        }
        $model->position = $request->slider_position;
        $model->save();
        return redirect()->route('slider.index');
    }

    public function destroy($id){
        $model = Slider::findOrFail($id);
        if(!empty($model->image)){
            Storage::delete("public/" . $model->image);
        }
        $model->delete();
        return redirect()->route('slider.index');
    }
}
