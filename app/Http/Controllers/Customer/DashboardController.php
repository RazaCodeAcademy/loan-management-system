<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Agreement;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $agreements = Agreement::where('loanee_id', Auth::id())->count();
        $payments = Payment::orderBy('created_at')->whereIn('agreement_id', Auth::user()->agreements->pluck('id'))->count();
        $amounts = Payment::orderBy('created_at')->whereIn('agreement_id', Auth::user()->agreements->pluck('id'))->pluck('amount');
        $amounts = $amounts->sum();
        $installments = Payment::orderBy('created_at')->whereIn('agreement_id', Auth::user()->agreements->pluck('id'))->pluck('installment')->count();
        return view('customer.pages.dashboard.index', compact(
            'agreements',
            'payments',
            'amounts',
            'installments',
        ));
    }

    public function cancelAgreement($id)
    {
        $agreement = Agreement::find($id);
        $agreement->cancelation = date('Y-m-d');
        $agreement->isRead = 0;
        $agreement->update();
        return back()->with('success', 'Agreement cancel successfuly!');
    }

    public function payments()
    {
        
        $payments = Payment::orderBy('created_at')->whereIn('agreement_id', Auth::user()->agreements->pluck('id'))->get();
        return view('customer.pages.payments.index', compact('payments'));
    }
}
