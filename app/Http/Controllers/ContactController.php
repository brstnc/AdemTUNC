<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front.contact');
    }

    public function contact_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'numeric'
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->last_name = $request->last_name;
        $contact->company_name = $request->company_name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('front.contact');
    }
}
