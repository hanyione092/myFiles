<?php

namespace App\Http\Controllers;

use App\Mail\TestMail; //required
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //required

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Registered Successfully',
            'name' => 'John Patrick Buco',
            'body' => 'www.facebook.com/hanyiboy'
        ];

        Mail::to("hanyione09@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
