<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->title = $request->title;

        $category->description = $request->description;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/categories/',$filename);
            $category->image = '/public/uploads/categories/'.$filename;
        }else{
            $category->image = null;
        }

        if($category->save()){
            return redirect()->route('categories.index')->with('success', 'Category Added Successfuly!');
        }else{
            return redirect()->route('categories.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->title = $request->title;

        $category->description = $request->description;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/categories/',$filename);
            $category->image = '/public/uploads/categories/'.$filename;
        }

        if($category->update()){
            return redirect()->route('categories.index')->with('success', 'Category Updated Successfuly!');
        }else{
            return redirect()->route('categories.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $filePath = public_path(str_replace('/public/', '', $category->image));

        file_exists($filePath) ? unlink($filePath) : "";

        if($category->delete()){
            return redirect()->route('categories.index')->with('success', 'Category Deleted Successfuly!');
        }else{
            return redirect()->route('categories.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function status($id)
    {
        $category = Category::find($id);

        $category->status = !$category->status;

        $category->update();

        if($category->status == 1){
            return redirect()->route('categories.index')->with('success', 'Category Activated Successfuly!');
        }else{
            return redirect()->route('categories.index')->with('error', 'Category DeActivated Successfuly!');
        }
    }
}
