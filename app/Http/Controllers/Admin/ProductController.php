<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Agreement;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        $products = Agreement::where([
            ['product_name', '!=', Null],
            ['cancelation', '!=', Null],
            ['admin_product', 0],
        ])->get();

        $categories = Category::where('status', true)->get();

        return view('admin.pages.products.create', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        // asign loanee product to admin
        $agreement = Agreement::find($request->agreement_id);

        $agreement->admin_product = 1;

        // new product create

        $product = new Product();

        $product->title = $agreement->product_name;

        $product->agreement_id = $request->agreement_id;

        $product->description = $request->description;

        $product->description = $request->description;

        $product->category_id = $request->category_id;

        $product->discount = $request->discount;

        $product->price = $request->price;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/products/',$filename);
            $product->image = '/public/uploads/products/'.$filename;
        }else{
            $product->image = null;
        }

        if($product->save() && $agreement->update()){
            return redirect()->route('products.index')->with('success', 'Product Added Successfuly!');
        }else{
            return redirect()->route('products.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::where('status', true)->get();

        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;

        $product->description = $request->description;

        $product->description = $request->description;

        $product->category_id = $request->category_id;

        $product->discount = $request->discount;

        $product->price = $request->price;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/products/',$filename);
            $product->image = '/public/uploads/products/'.$filename;
        }

        if($product->update()){
            return redirect()->route('products.index')->with('success', 'Product Updated Successfuly!');
        }else{
            return redirect()->route('products.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $filePath = public_path(str_replace('/public/', '', $product->image));

        file_exists($filePath) ? unlink($filePath) : "";

        if($product->delete()){
            return redirect()->route('products.index')->with('success', 'Product Deleted Successfuly!');
        }else{
            return redirect()->route('products.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function status($id)
    {
        $product = Product::find($id);

        $product->status = !$product->status;

        $product->update();

        if($product->status == 1){
            return redirect()->route('products.index')->with('success', 'Product Activated Successfuly!');
        }else{
            return redirect()->route('products.index')->with('error', 'Product DeActivated Successfuly!');
        }
    }
}
