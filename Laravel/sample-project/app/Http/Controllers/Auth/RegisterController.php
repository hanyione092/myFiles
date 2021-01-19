<?php

namespace App\Http\Controllers\Auth;

use App\Models\User; // we add this because of User::create();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash; //we add this because of Hash::make for password encryption


class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max: 255', //you can  you array too like ['required', 'max:255']. But kung konting validation lang naman, mag string based ka nalang like ng ginawa ko
            'username' => 'required|max: 255',
            'email' => 'required|email|max: 255',
            'password' => 'required|confirmed'
        ]);
// User::create is a model, to make a model, php artisan make:model
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard'); // if you want to skip the route, you can use like this, redirect('/dashboard')
    }
}
