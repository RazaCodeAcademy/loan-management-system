<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Agreement;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        $products = Agreement::where([
            ['product_name', '!=', Null],
            ['cancelation', '!=', Null],
        ])->get();
        return view('admin.pages.services.create', compact($products));
    }

    public function store(Request $request)
    {
        $service = new Service();

        $service->title = $request->title;

        $service->description = $request->description;

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
            return redirect()->route('services.index')->with('success', 'service Added Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin.pages.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->title = $request->title;

        $service->description = $request->description;

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
            return redirect()->route('services.index')->with('success', 'service Updated Successfuly!');
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
            return redirect()->route('services.index')->with('success', 'service Deleted Successfuly!');
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
            return redirect()->route('services.index')->with('success', 'service Activated Successfuly!');
        }else{
            return redirect()->route('services.index')->with('error', 'service DeActivated Successfuly!');
        }
    }
}
