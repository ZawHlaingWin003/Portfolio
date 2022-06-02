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
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        if($validation->fails()){
            return response()->json(['code' => 400, 'response' => $validation->errors()->toArray()]);
        }

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $receiver = 'davidzaw1111@gmail.com';
        Mail::to($receiver)->send(new ContactMail($name, $email, $subject, $message));

        return response()->json(['code' => 200, 'response' => "Thank you for contact us, we'll be touch you soon"]);
    }
}
