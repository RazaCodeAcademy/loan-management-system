<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class LoaneeController extends Controller
{
    public function index()
    {
        $loanees = User::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.loanee.index', compact('loanees'));
    }

    public function create()
    {
        return view('admin.pages.loanee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $loanee = new User();

        $loanee->name = $request->name;

        $loanee->email = $request->email;

        $loanee->phone = $request->phone;

        $loanee->address = $request->address;

        $loanee->payment_type = $request->payment_type;

        $loanee->password = bcrypt($request->password);

        $loanee->role = 2;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/loanees/',$filename);
            $loanee->image = '/public/uploads/loanees/'.$filename;
        }else{
            $loanee->image = null;
        }

        if($loanee->save()){
            return redirect()->route('loanee.index')->with('success', 'loanee Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $loanee = User::find($id);

        return view('admin.pages.loanee.edit', compact('loanee'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $loanee = User::find($id);

        $loanee->name = $request->name;

        $loanee->phone = $request->phone;

        $loanee->address = $request->address;

        $loanee->payment_type = $request->payment_type;

        if($request->password){
            $loanee->password = bcrypt($request->password);
        }

        $loanee->role = 2;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/loanees/',$filename);
            $loanee->image = '/public/uploads/loanees/'.$filename;
        }

        if($loanee->update()){
            return redirect()->route('loanee.index')->with('success', 'loanee Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function show($id)
    {
        $loanee = User::find($id);

        return view('admin.pages.loanee.show', compact('loanee'));
    }

    public function destroy($id)
    {
        $loanee = User::find($id);

        $loanee->delete();

        if($loanee->delete()){
            return redirect()->route('loanee.index')->with('success', 'loanee Deleted Successfuly!');
        }else{
            return redirect()->route('loanee.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function loaneeStatus($id)
    {
        $loanee = User::find($id);

        $loanee->status = !$loanee->status;

        $loanee->update();

        if($loanee->status == 1){
            return redirect()->route('loanee.index')->with('success', 'loanee Activated Successfuly!');
        }else{
            return redirect()->route('loanee.index')->with('error', 'loanee DeActivated Successfuly!');
        }
    }

    public function loaneeStatus(Request $request)
    {
        $loanee = User::find($id);

        $loanee->status = !$loanee->status;

        $loanee->update();

        if($loanee->status == 1){
            return redirect()->route('loanee.index')->with('success', 'loanee Activated Successfuly!');
        }else{
            return redirect()->route('loanee.index')->with('error', 'loanee DeActivated Successfuly!');
        }
    }
}
