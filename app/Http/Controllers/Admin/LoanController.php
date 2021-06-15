<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.loan.index', compact('loans'));
    }

    public function create()
    {
        return view('admin.pages.loan.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'loan_type' => 'required',
        ]);

        $loan = new Loan();

        $loan->loan_type = $request->loan_type;

        $loan->description = $request->description;


        if($loan->save()){
            return redirect()->route('loans.index')->with('success', 'Loan Added Successfuly!');
        }else{
            return redirect()->route('loans.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $loan = Loan::find($id);

        return view('admin.pages.loan.edit', compact('loan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loan_type' => 'required',
        ]);

        $loan = Loan::find($id);

        $loan->loan_type = $request->loan_type;

        $loan->description = $request->description;

        if($loan->update()){
            return redirect()->route('loans.index')->with('success', 'Loan Updted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }

    }

    public function show($id)
    {
        $loan = Loan::find($id);

        return view('admin.pages.loan.show', compact('loan'));
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);

        if($loan->delete()){
            return redirect()->route('loans.index')->with('success', 'Loan Deleted Successfuly!');
        }else{
            return redirect()->route('loans.index')->with('error', 'Something went wrong please try again!');
        }
    }

}
