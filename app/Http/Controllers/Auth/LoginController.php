<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->flash('message', 'Your Login is Successfully');
            return redirect('/user');
        } else {
            session()->flash('message1', 'Your Email and Password is Incorrect');
            return redirect('/');
        }
    }
}
