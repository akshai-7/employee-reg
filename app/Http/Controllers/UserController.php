<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist()
    {
        $user = User::all();
        return view('/user', compact('user'));
    }

    public function edituser($id)
    {
        $edit = User::where('id', $id)->get();
        return view('/edituser', compact('edit'));
    }

    public function update(Request $request)
    {
        $update = User::where('id', $request->id)->first();
        $update->firstname = $request['firstname'];
        $update->lastname = $request['lastname'];
        $update->fathername = $request['fathername'];
        $update->email = $request['email'];
        $update->address = $request['address'];
        $update->mobile = $request['mobile'];
        $update->description = $request['description'];
        $update->save();
        return redirect('/user');
    }
    public function remove($id)
    {
        $remove = User::find($id);
        $remove->delete();
        return redirect('/user');
    }
}