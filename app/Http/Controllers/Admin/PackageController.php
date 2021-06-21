<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\PackageItem;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.pages.packages.create');
    }

    public function store(Request $request)
    {
        $package = new Package();

        $package->title = $request->title;

        $package->description = $request->description;

        $package->save();

        if(!empty($request->packagePoints)){

            foreach ($request->packagePoints as $packagePoint) {
    
                $point = new PackageItem();
    
                $point->package_id = $package->id;
    
                $point->items = $packagePoint['items'];
    
                $point->save();
            }

        }

        if($package){
            return redirect()->route('packages.index')->with('success', 'Package Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
    
    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.pages.packages.edit', compact('package'));
    }
    
    public function update(Request $request, $id)
    {

        $package = Package::find($id);

        $package->title = $request->title;

        $package->description = $request->description;

        $package->update();

        if(!empty($request->packagePoints)){

            foreach ($request->packagePoints as $packagePoint) {
    
                $point = new PackageItem();
    
                $point->package_id = $package->id;
    
                $point->items = $packagePoint['items'];
    
                $point->save();
            }

        }

        if($package->update()){
            return back()->with('success', 'Package Updated Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    } 

    public function destroy($id)
    {
        $package = Package::find($id);

        if($package->packagePoints){
            foreach ($package->packagePoints as $key => $point) {
                $point->delete();
            }
        }
        
        if($package->delete()){
            return redirect()->route('packages.index')->with('success', 'Package Deleted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }

    public function itemRemove($id)
    {
        $point = PackageItem::find($id);
        
        if($point->delete()){
            return back()->with('success', 'Package Point Deleted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
}
