<?php

namespace App\Http\Controllers;

use App\Mail\TestMail; //required
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //we add this because of Hash::make for password encryption
use Illuminate\Support\Facades\Mail; //required

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $details = [
            'title' => 'Registered Successfully',
            'name' => $request->username,
            'body' => 'www.facebook.com/hanyiboy'
        ];

        Mail::to($request->email)->send(new TestMail($details));

        auth()->attempt($request->only('email', 'password'));

        return redirect('/'); // if you want to skip the route, you can use like this, redirect('/dashboard')
    }
}
