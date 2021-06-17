<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.contacts.index', compact('contacts'));
    }

    public function readContact($id)
    {
        $contact = Contact::find($id);

        $contact->status = true;

        $status = $contact->update() ? true : false;

        $message = $status ? 'Admin read this row successfully!' : 'Something went wrong please try again!';
        
        return response()->json(
            [
                'status' => $status,
                'message' => $message,
            ]
        , 200);
    
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if($contact->delete()){
            return redirect()->route('contacts.index')->with('success', 'Contact Deleted Successfuly!');
        }else{
            return redirect()->route('contacts.index')->with('error', 'Something went wrong please try again!');
        }
    }
}
