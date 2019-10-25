<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use PhpParser\Node\Stmt\DeclareDeclare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'required|email',
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

        return view('front.contact');
    }
    public function sendMail(Request $request) {
        //dd($request->all());

        $validator = \Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required',
                'bodymessage' => 'required']
        );

        if ($validator->fails()) {
            return redirect('contact')->withInput()->withErrors($validator);
        }


        $name = $request->name;
        $email = $request->email;
        $title = $request->subject;
        $content = $request->bodymessage;


        Mail::send('emails.visitor_email', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) {

            $message->to('your.email@gmail.com')->subject('Subject of the message!');
        });


        return redirect('contact')->with('status', 'You have successfully sent an email to the admin!');

    }
}
