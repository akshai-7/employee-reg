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

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'fathername' => 'required',
            'address' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'description' => 'required',
            'image' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);
        $register = new User();
        $register->firstname = $request['firstname'];
        $register->lastname = $request['lastname'];
        $register->fathername = $request['fathername'];
        $register->email = $request['email'];
        $register->address = $request['address'];
        $register->mobile = $request['mobile'];
        $register->description = $request['description'];
        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['image']); $i++) {
            $imageName = time() . '.' . $data['image'][$i]->getClientOriginalName();
            $data['image'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data1 = array(
            'image' =>  implode(",", $img),
        );
        $register->image = $data1['image'];
        $register->password = Hash::make($request['password']);
        $register->save();
        session()->flash('message', 'New Employee is Created');
        return redirect('/register');
    }
}
