<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CompanyInfo;

class CompanyController extends Controller
{
    public function index()
    {
        $informations = CompanyInfo::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.companyInfo.index', compact('informations'));
    }

    public function create()
    {

        return view('admin.pages.companyInfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
            'contact1' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $info = new CompanyInfo();

        $info->name = $request->name;

        $info->description = $request->description;

        $info->contact1 = $request->contact1;

        $info->contact2 = $request->contact2 ? $request->contact2 : null;

        $info->email = $request->email;

        $info->address = $request->address;

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/companyInfo/',$filename);
            $info->logo = '/public/uploads/companyInfo/'.$filename;
        }else{
            $info->logo = null;
        }

        if($info->save()){
            return redirect()->route('company.index')->with('success', 'Info Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $info = CompanyInfo::find($id);

        return view('admin.pages.companyInfo.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'contact1' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $info = CompanyInfo::find($id);

        $info->name = $request->name;

        $info->description = $request->description;

        $info->contact1 = $request->contact1;

        $info->contact2 = $request->contact2 ? $request->contact2 : null;

        $info->email = $request->email;

        $info->address = $request->address;

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/companyInfo/',$filename);
            $info->logo = '/public/uploads/companyInfo/'.$filename;
        }

        if($info->update()){
            return redirect()->route('company.index')->with('success', 'Info Updated Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function destroy($id)
    {
        $info = CompanyInfo::find($id);

        $filePath = public_path(str_replace('/public/', '', $info->logo));

        file_exists($filePath) ? unlink($filePath) : "";


        if($info->delete()){
            return redirect()->route('company.index')->with('success', 'Info Deleted Successfuly!');
        }else{
            return redirect()->route('company.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function status($id)
    {
        $info = CompanyInfo::where('status', true)->first();

        $info->status = !$info->status;

        $info->update();

        $info = CompanyInfo::find($id);

        $info->status = !$info->status;

        $info->update();

        if($info->status == 1){
            return redirect()->route('company.index')->with('success', 'Info Activated Successfuly!');
        }else{
            return redirect()->route('company.index')->with('error', 'Info DeActivated Successfuly!');
        }
    }
}
