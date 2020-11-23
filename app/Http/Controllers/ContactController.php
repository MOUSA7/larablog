<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{

    public function contact(){

        return view('frontend.pages.contact');
    }

    public function send(Request $request){

//        dd($request->all());
        $roles = [
            'name' => 'required | max:16 |min:4',
            'email'=> 'required | email ',
            'mail_message'=> 'required |max:500'
        ];

        $this->validate($request,$roles);

        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'subject'=>$request->subject,
            'mail_message'=>$request->mail_message,
        ];
        Mail::send('emails.send',$data,function($message) use ($request){
            $message->to('eng.mousa.sh@gmail.com','Mousa')->from($request->email,'Larablog'.'-'.$request->name)->subject('mail received from contact Page');
        });
        Alert::success('Successful Send', 'Your Send Messages Successfully Now !');
        return redirect('/');
    }
    //
}
