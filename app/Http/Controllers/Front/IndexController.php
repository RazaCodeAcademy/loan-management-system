<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSlider;
use App\Models\Service;

class IndexController extends Controller
{
    public function index()
    {
        $slider = HomeSlider::where('status', 1)->first(); 

        $services = Service::where('status', 1)->get();

        return view('index', compact('slider','services'));
    }

    public function chat($number)
    {
        return redirect('https://api.whatsapp.com/send?phone=+92'.$number);
    }
}
