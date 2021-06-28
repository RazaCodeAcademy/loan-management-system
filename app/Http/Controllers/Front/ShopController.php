<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Helper\Cart;

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

    public function show($id)
    {
        $product = Product::find($id);
        return view('front.shop.show', compact('product'));
    }

    public function shoppingCart()
    {
        if (!Session::has('cart')) {
            return view('front.shop.cart', [
                'products' => null,
            ]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('front.shop.cart', compact('products', 'totalPrice'));
    }

    public function addtocart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        $request->session()->get('cart');

        return back();
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return back();
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return back();
    }

    public function emptyCart()
    {
        Session::forget('cart');
        return back();
    }
}
