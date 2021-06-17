<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Agreement;

use Carbon\Carbon;
use DateTime;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.payments.index', compact('payments'));
    }

    public function create()
    {
        $agreements = Agreement::where([
            ['status', 1],
            ['completed', 0],
        ])->get();
        return view('admin.pages.payments.create', compact('agreements'));
    }

    public function getAgreementInfo($id)
    {
        $agreement = Agreement::find($id);

        $installment = $agreement->payments->count() + 1;
        
        $last_date = $agreement->payments->count() > 0 ? $agreement->payments->last()->created_at : null;

        if ($agreement->payable_type == 1) {
            $last_date = Carbon::parse($last_date)->addDay(1);
        }elseif($agreement->payable_type == 2){
            $last_date = Carbon::parse($last_date)->addWeeks(1);
        }elseif($agreement->payable_type == 3){
            $last_date = Carbon::parse($last_date)->addMonths(1);
        }
     
        $late_charges = Carbon::now() > $last_date ? $last_date->diffInDays(Carbon::now()) : 0;

        if($late_charges > 0){
            $late_charges = ($late_charges + 1 ) * $agreement->late_charges;
        }

        return response()->json(
            [
                'installment' => $installment,
                'last_date' => $last_date,
                'late_charges' => $late_charges,
            ]
        , 200);
    }

    public function store(Request $request)
    {
        // return $request;
        $agreement = Agreement::find($request->agreement_id);
        
        $interest = ($agreement->loan_amount * $agreement->interest_rate / 100);

        $payment = new Payment();

        $payment->payer_name = $request->payer_name;

        $payment->agreement_id = $request->agreement_id;

        $payment->amount = ($request->amount + $interest + $request->late_charges);

        $payment->late_charges = $request->late_charges;

        $payment->installment = $request->installment;

        $payment->last_date = $request->last_date;

        $payment->status = true;

        if($payment->save()){
            return redirect()->route('payments.index')->with('success', 'Payment Added Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
    
    public function edit($id)
    {
        $payment = PaymentType::find($id);
        return view('admin.pages.payments.edit', compact('payment'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $payment_type = PaymentType::find($id);

        $payment_type->title = $request->title;

        if($payment_type->update()){
            return redirect()->route('payments.index')->with('success', 'Payment_type Updated Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    } 

    public function destroy($id)
    {
        $payment_type = PaymentType::find($id);
        
        if($payment_type->delete()){
            return redirect()->route('payments.index')->with('success', 'Payment_type Deleted Successfuly!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
}
