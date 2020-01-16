<?php

namespace App\Http\Controllers\Backend;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
  
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->paginate(10);
        return view('backend.slider.index', compact('sliders'));
    }

  
public function unactive_slider($id)
{
    DB::table('sliders')
        ->where('id', $id)
        ->update(['status' => 0 ]);
        return redirect('admin/slider')->with('status', 'Slider Unactive Succssfully!');
}

public function active_slider($id)
{
    DB::table('sliders')
        ->where('id', $id)
        ->update(['status' => 1 ]);
        return redirect('admin/slider')->with('status', 'Slider Active Succssfully!');
}


    public function create()
    {
        return view('backend.slider.create');
    }


    public function store(SliderRequest $request)
    {
        $slider = new Slider();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $dir = public_path('images/slider');
            $image->move($dir, $imgName);
            $slider->image = $imgName;
        }
        $slider->title = $request->title;
        $slider->status = $request->status;

        $slider->save();

        return redirect('admin/slider')->with('status', 'Slider Create Successfully');
    }

 
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin/slider/edit', compact('slider'));

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
