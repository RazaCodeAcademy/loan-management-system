<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Agreement;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('status', true)->get();

        return view('admin.pages.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $service = new Service();

        $service->title = $request->title;

        $service->description = $request->description;

        $service->description = $request->description;

        $service->category_id = $request->category_id;

        $service->discount = $request->discount;

        $service->price = $request->price;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/services/',$filename);
            $service->image = '/public/uploads/services/'.$filename;
        }else{
            $service->image = null;
        }

        if($service->save()){
            return redirect()->route('services.index')->with('success', 'Service Added Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $service = Service::find($id);

        $categories = Category::where('status', true)->get();

        return view('admin.pages.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->title = $request->title;

        $service->description = $request->description;

        $service->description = $request->description;

        $service->category_id = $request->category_id;

        $service->discount = $request->discount;

        $service->price = $request->price;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/services/',$filename);
            $service->image = '/public/uploads/services/'.$filename;
        }

        if($service->update()){
            return redirect()->route('services.index')->with('success', 'Service Updated Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        $filePath = public_path(str_replace('/public/', '', $service->image));

        file_exists($filePath) ? unlink($filePath) : "";

        if($service->delete()){
            return redirect()->route('services.index')->with('success', 'Service Deleted Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function status($id)
    {
        $service = Service::find($id);

        $service->status = !$service->status;

        $service->update();

        if($service->status == 1){
            return redirect()->route('services.index')->with('success', 'Service Activated Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'Service DeActivated Successfuly!');
        }
    }
}
