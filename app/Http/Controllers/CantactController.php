<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Mail;
use App\models\Contact;
use App\Http\Controllers\CarController;

class CantactController extends Controller
{
    //
    public function sendmail(Request $request)
    {
        $data =$request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string',
            'email'=>'required',
            'message'=>'required',
            ] );
            Contact::create($data);
            Mail::to( 'alaa@email.com')->send( new DemoMail($data));
         // return "mail sent!";
          return redirect('Contact');    }
}

