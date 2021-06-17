<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contactUs.index');
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
