<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
       return view('user.dashboard'); 
    }
    public function profilEdit()
    {
        $user = User::find(session('id'));
        return view('user.profilEdit', ['user' => $user]);
    }
    public function profilUpdate($id,Request $request )
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $username = $request->input('username');
        $user->username = $username;
        if ($request->input('password') !== null) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->email = $request->input('email');
        if($request->file('anaResim') !== null){
            if ($request->file('anaResim')) {
                $file = $request->file('anaResim');
                $photo_filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path("userPhoto/$username/anaResim/"), $photo_filename);
            }
            $user->anaResim = $photo_filename== null? " ": $photo_filename;
        }
        $user->save();
        return Redirect::back()->withErrors(
            [
                'info' => 'Bilgiler başarıyla değiştirmiştir.'
            ]
        );
    }
}
