<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        
        $limitedProducts = Product::orderBy('created_at', 'DESC')->where('status', 1)->take(3)->get();

        // $allProducts = Product::orderBy('created_at', 'DESC')->where('status', 1)->skip(3)->take(100)->get();
        $allProducts = Product::orderBy('created_at', 'DESC')->where('status', 1)->get();

        $categories = Category::where('status', 1)->get();

        return view('front.shop.index', compact('limitedProducts', 'allProducts', 'categories'));
    }
}
