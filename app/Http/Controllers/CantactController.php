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
        $messages = $this->messages();
        $data =$request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string',
            'email'=>'required',
            'message'=>'required',
            ]  ,$messages);
            Contact::create($data);
            Mail::to( 'alaa@email.com')->send( new DemoMail($data));
         // return "mail sent!";
          return redirect('Contact');    
        }
        public function messages(){
            return [
                'first_name.string'=>'Should be string',
                'last_name.required'=>'Should be string',
                'email.required'=>'Should be string',
                'message.string'=>'Should be string',

                ];
       
        }
}


