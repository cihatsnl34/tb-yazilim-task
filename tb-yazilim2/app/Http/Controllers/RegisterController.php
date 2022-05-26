<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $username = $request->input('username');
        $user->username = $username;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $photo_filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path("userPhoto/$username/anaResim/"), $photo_filename);
        }
        $user->anaResim = $photo_filename== null? " ": $photo_filename;
        $user->save();
        return redirect()->route('user.login');  
    }
}
