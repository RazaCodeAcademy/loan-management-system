<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.pages.create');
    }

    public function store(Request $request)
    {
        $page = new Page();

        $page->title = $request->title;

        $page->description = $request->description;

        $page->slug = Str::slug($request->title, '-');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/pages/',$filename);
            $page->image = '/public/uploads/pages/'.$filename;
        }else{
            $page->image = null;
        }

        if($page->save()){
            return redirect()->route('page.index')->with('success', 'Page Added Successfuly!');
        }else{
            return redirect()->route('page.index')->with('error', 'Something went wrong please try again!');
        }

    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $page->title = $request->title;

        $page->description = $request->description;

        $page->slug = Str::slug($request->title, '-');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($name, PATHINFO_FILENAME);
            $filename = $name.time(). '.' .$extension;
            $file->move('public/uploads/pages/',$filename);
            $page->image = '/public/uploads/pages/'.$filename;
        }

        if($page->update()){
            return redirect()->route('page.index')->with('success', 'Page Updated Successfuly!');
        }else{
            return redirect()->route('page.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function destroy($id)
    {
        $page = Page::find($id);

        $filePath = public_path(str_replace('/public/', '', $page->image));

        file_exists($filePath) ? unlink($filePath) : "";

        if($page->delete()){
            return redirect()->route('page.index')->with('success', 'Page Deleted Successfuly!');
        }else{
            return redirect()->route('page.index')->with('error', 'Something went wrong please try again!');
        }
    }

    public function status($id)
    {
        $page = Page::find($id);

        $page->status = !$page->status;

        $page->update();

        if($page->status == 1){
            return redirect()->route('page.index')->with('success', 'Page Activated Successfuly!');
        }else{
            return redirect()->route('page.index')->with('error', 'Page DeActivated Successfuly!');
        }
    }
}
