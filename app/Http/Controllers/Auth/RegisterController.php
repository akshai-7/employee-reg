<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $register = new User();
        $register->firstname = $request['firstname'];
        $register->lastname = $request['lastname'];
        $register->fathername = $request['fathername'];
        $register->email = $request['email'];
        $register->address = $request['address'];
        $register->mobile = $request['mobile'];
        $register->description = $request['description'];
        $register->password = Hash::make($request['password']);
        $register->save();
        return redirect('/');
    }
}
