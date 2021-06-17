<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSlider;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        return view('index', compact('sliders'));
    }
}
