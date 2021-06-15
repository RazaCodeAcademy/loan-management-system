<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowDoesItWorkController extends Controller
{
    public function index()
    {
        return view('front.howDoesItWorks.index');
    }
}
