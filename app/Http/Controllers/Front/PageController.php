<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('front.pages.index', compact('page'));
    }
}
