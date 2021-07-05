<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Agreement;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::where('role', 2)->count();
        $agreements = Agreement::all()->count();
        $amounts = Payment::all()->pluck('amount');
        $amounts = $amounts->sum();
        $orders = Agreement::all()->count();
        return view('admin.pages.dashboard.index', compact(
            'customer',
            'agreements',
            'orders',
            'amounts',
        ));
    }
}
