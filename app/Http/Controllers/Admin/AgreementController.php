<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Loan;
use App\Models\Agreement;

class AgreementController extends Controller
{
    public function index()
    {
        $agreements = Agreement::all();
        return view('admin.pages.agreements.index', compact('agreements'));
    }

    public function create($loanee_id)
    {
        $loan_types = Loan::all();

        return view('admin.pages.agreements.create', compact('loanee_id', 'loan_types'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'loan_amount' => 'required',
            'agreement_attachment' => 'required',
            'disbursement_date' => 'required',
            'loan_type' => 'required',
            'payable_type' => 'required',
            'interest_rate' => 'required',
            'expected_first_payment_date' => 'required',
            'late_charges' => 'required',
        ]);

        $agreement = new Agreement();

        $agreement->loanee_id = $request->loanee_id;

        $agreement->loan_amount = $request->loan_amount;

        $agreement->loan_type = $request->loan_type;

        $agreement->disbursement_date = $request->disbursement_date;

        $agreement->payable_type = $request->payable_type;

        $agreement->interest_rate = $request->interest_rate;

        $agreement->late_charges = $request->late_charges;

        $agreement->expected_first_payment_date = $request->expected_first_payment_date;
        
        $agreement->product = $request->product;

        if ($request->hasfile('agreement_attachment')) {
            $file = $request->file('agreement_attachment');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/agreements/',$filename);
            $agreement->agreement_attachment = '/public/uploads/agreements/'.$filename;
        }

        if ($request->hasfile('product')) {
            $file = $request->file('product');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/products/',$filename);
            $agreement->product = '/public/uploads/products/'.$filename;
        }else{
            $agreement->product = null;
        }

        if($agreement->save()){
            return redirect()->route('agreements.index')->with('success', 'Agreement Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $agreement = Agreement::find($id);
        $loan_types = Loan::all();

        return view('admin.pages.agreements.edit', compact('agreement', 'loan_types'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'loan_amount' => 'required',
            'disbursement_date' => 'required',
            'loan_type' => 'required',
            'payable_type' => 'required',
            'interest_rate' => 'required',
            'expected_first_payment_date' => 'required',
            'late_charges' => 'required',
        ]);

        $agreement = Agreement::find($id);

        $agreement->loanee_id = $request->loanee_id;

        $agreement->loan_amount = $request->loan_amount;

        $agreement->loan_type = $request->loan_type;

        $agreement->disbursement_date = $request->disbursement_date;

        $agreement->payable_type = $request->payable_type;

        $agreement->interest_rate = $request->interest_rate;

        $agreement->late_charges = $request->late_charges;

        $agreement->expected_first_payment_date = $request->expected_first_payment_date;

        $agreement->product_name = $request->product_name;

        if ($request->hasfile('agreement_attachment')) {
            $file = $request->file('agreement_attachment');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/agreements/',$filename);
            $agreement->agreement_attachment = '/public/uploads/agreements/'.$filename;
        }

        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/products/',$filename);
            $agreement->product_image = '/public/uploads/products/'.$filename;
        }else{
            $agreement->product_image = null;
        }

        if($agreement->update()){
            return redirect()->route('agreement.index')->with('success', 'Agreement Updated Successfuly!');
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

    public function agreementStatus($id)
    {
        $agreement = Agreement::find($id);

        $agreement->status = !$agreement->status;

        $agreement->update();

        if($agreement->status == 1){
            return redirect()->route('agreement.index')->with('success', 'agreement Activated Successfuly!');
        }else{
            return redirect()->route('agreement.index')->with('error', 'agreement DeActivated Successfuly!');
        }
    }
}
