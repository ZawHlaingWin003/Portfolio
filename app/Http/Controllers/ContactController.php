<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $receiver = config('mail.from.address');
        Mail::to($receiver)->send(new ContactMail($name, $email, $subject, $message));

        return response()->json([
            'success' => true,
            'message' => "Thank you for contacting us, we'll be touch you soon"
        ], 200);
    }
}
