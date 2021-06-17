<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $payment_types = PaymentType::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.payment_type.index', compact('payment_types'));
    }

    public function create()
    {
        return view('admin.pages.payment_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $payment_type = new PaymentType();

        $payment_type->title = $request->title;

        if($payment_type->save()){
            return redirect()->route('payment_types.index')->with('success', 'Payment_type Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
    
    public function edit($id)
    {
        $payment_type = PaymentType::find($id);
        return view('admin.pages.payment_type.edit', compact('payment_type'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $payment_type = PaymentType::find($id);

        $payment_type->title = $request->title;

        if($payment_type->update()){
            return redirect()->route('payment_types.index')->with('success', 'Payment_type Updated Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    } 

    public function destroy($id)
    {
        $payment_type = PaymentType::find($id);
        
        if($payment_type->delete()){
            return redirect()->route('payment_types.index')->with('success', 'Payment_type Deleted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
}
