<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSlider;

class HomePageController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.homePage.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.pages.homePage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $slider = new HomeSlider();

        $slider->title = $request->title;

        $slider->description = $request->description;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/sliders/',$filename);
            $slider->image = '/public/uploads/sliders/'.$filename;
        }else{
            $slider->image = null;
        }

        if($slider->save()){
            return redirect()->route('slides.index')->with('success', 'Slider Added Successfuly!');
        }else{
            return redirect()->route('slides.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $slider = HomeSlider::find($id);

        return view('admin.pages.homePage.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slider = HomeSlider::find($id);

        $slider->title = $request->title;

        $slider->description = $request->description;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/sliders/',$filename);
            $slider->image = '/public/uploads/sliders/'.$filename;
        }

        if($slider->update()){
            return redirect()->route('slides.index')->with('success', 'Slider Updted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function show($id)
    {
        $slider = HomeSlider::find($id);

        return view('admin.pages.homePage.show', compact('slider'));
    }

    public function destroy($id)
    {
        $slider = HomeSlider::find($id);

        $slider->delete();

        if($slider->delete()){
            return redirect()->route('slides.index')->with('success', 'Slider Deleted Successfuly!');
        }else{
            return redirect()->route('slides.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function sliderStatus($id)
    {
        $slider = HomeSlider::find($id);

        $slider->status = !$slider->status;

        $slider->update();

        if($slider->status == 1){
            return redirect()->route('slides.index')->with('success', 'Slider Activated Successfuly!');
        }else{
            return redirect()->route('slides.index')->with('error', 'Slider DeActivated Successfuly!');
        }
    }

}
