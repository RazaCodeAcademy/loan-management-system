<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agreement;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.pages.dashboard.index');
    }

    public function cancelAgreement($id)
    {
        $agreement = Agreement::find($id);
        $agreement->cancelation = date('Y-m-d');
        $agreement->isRead = 0;
        $agreement->update();
        return back()->with('success', 'Agreement cancel successfuly!');
    }
}
