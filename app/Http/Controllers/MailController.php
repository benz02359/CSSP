<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send ()
     {
        $data = array('name'=>"sam","body"=>"Test");
        Mail::send('cssp.mail',$data,function($message){
        $message->to('benz02359@hotmail.com','To benz')->subject('New Posts');
        $message->from('CSS@css.com','Customer Support Service');
        
            

        });
    }
}
