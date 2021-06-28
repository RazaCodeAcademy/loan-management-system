<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\CompanyInfo;

class ContactController extends Controller
{
    public function index()
    {
        $info = CompanyInfo::where('status', true)->first();
        return view('front.contactUs.index', compact('info'));
    }
    
    public function store(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->message = $request->message;

        if($contact->save()){
            return back()->with('success', 'Message sent successfuly admin will contact you soon!');
        }else{
            return back()->with('error', 'Something went wrong please try again!');
        }
    }
}
