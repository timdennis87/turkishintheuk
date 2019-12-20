<?php

namespace App\Http\Controllers;

use App\ClassBox;
use App\ClassType;
use App\Contact;
use App\Message;
use App\Option;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class JoinFormController extends Controller
{
    public function showForm()
    {
        return view('includes.site.contact-form');
    }

    public function submitForm(Request $request)
    {
        $subject     = Message::where('value', $request->subject)->first();
        $emailTo     = Option::where('value', 'main_email')->first(['description']);
        $classType   = ClassType::where('id', $request->classType)->first(['class_type']);
        $className   = ClassBox::where('id', $request->className)->first(['name']);
        $body        = $request->body;
        $ip          = request()->ip();
        $level       = \DB::table('class_levels')->where('id', $request->class_level)->first();

        $data = [
            'subject'     => $request->subject,
            'email'       => $request->email,
            'name'        => $request->name,
            'phoneNumber' => $request->phone_number,
            'classLevel'  => $level->name,
            'classType'   => $classType->class_type,
            'className'   => $className->name,
            'body'        => $request->body
        ];

        Mail::send('emails.join', $data, function ($message)
        use ($data,
            $subject,
            $emailTo)
        {
            $message->from($data['email']);
            $message->to($emailTo->description);
            $message->subject($subject->name);
        });

        Contact::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'class_level'  => $request->class_level,
            'class_type'   => $request->classType,
            'class_name'   => $request->className,
            'body'         => $body,
            'ip'           => $ip
        ]);

        return redirect()->back();
    }
}
