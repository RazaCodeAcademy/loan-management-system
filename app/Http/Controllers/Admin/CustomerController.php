<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PaymentType;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::orderBy('created_at', 'DESC')->where([
            ['role', 2],
        ])->get();

        return view('admin.pages.customer.index', compact('customers'));
    }

    public function chat($number)
    {
        return redirect('https://api.whatsapp.com/send?phone=+92'.$number);
    }

    public function create()
    {
        $payment_types = PaymentType::all();
        return view('admin.pages.customer.create', compact('payment_types'));
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

        $customer = new User();

        $customer->name = $request->name;

        $customer->email = $request->email;

        $customer->phone = $request->phone;

        $customer->address = $request->address;

        $customer->payment_type = $request->payment_type;

        $customer->password = bcrypt($request->password);

        $customer->role = 2;


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/customers/',$filename);
            $customer->image = '/public/uploads/customers/'.$filename;
        }else{
            $customer->image = null;
        }

        if($customer->save()){
            return redirect()->route('customer.index')->with('success', 'customer Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $customer = User::find($id);

        $payment_types = PaymentType::all();

        return view('admin.pages.customer.edit', compact('customer', 'payment_types'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = User::find($id);

        $customer->name = $request->name;

        $customer->phone = $request->phone;

        $customer->address = $request->address;

        $customer->payment_type = $request->payment_type;

        if($request->password){
            $customer->password = bcrypt($request->password);
        }

        $customer->role = 2;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/customers/',$filename);
            $customer->image = '/public/uploads/customers/'.$filename;
        }

        if($customer->update()){
            return redirect()->route('customer.index')->with('success', 'customer Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function show($id)
    {
        $customer = User::find($id);

        return view('admin.pages.customer.show', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = User::find($id);

        $customer->delete();

        if($customer->delete()){
            return redirect()->route('customer.index')->with('success', 'customer Deleted Successfuly!');
        }else{
            return redirect()->route('customer.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function customerStatus($id)
    {
        $customer = User::find($id);

        $customer->status = !$customer->status;

        $customer->update();

        if($customer->status == 1){
            return redirect()->route('customer.index')->with('success', 'customer Activated Successfuly!');
        }else{
            return redirect()->route('customer.index')->with('error', 'customer DeActivated Successfuly!');
        }
    }
}
