<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function sendSms (Request $request) {

        Nexmo::message()->send([
            'to'   => '66'. $request->mobile,
            'from' => '0992055853',
            'text' => 'Using the facade to send a message.'
        ]);

        //Session::flash('Success');
        return redirect('/testsms');
    }
}
