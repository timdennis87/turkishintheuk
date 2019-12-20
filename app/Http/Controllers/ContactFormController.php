<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function showForm()
    {
        return view('includes.site.contact-form');
    }

    public function submitContactForm(Request $request)
    {
        $emailTo = Option::where('value', 'main_email')->first(['description']);
        $body    = $request->body;
        $ip      = request()->ip();

        $data = [
            'email'       => $request->email,
            'name'        => $request->name,
            'phoneNumber' => $request->phone_number,
            'body'        => $request->body
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data, $emailTo) {

            $message->from($data['email']);
            $message->to($emailTo->description);
            $message->subject('Hello!');
        });

        Contact::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'body'         => $body,
            'ip'           => $ip
        ]);

        return redirect()->back();
    }
}
