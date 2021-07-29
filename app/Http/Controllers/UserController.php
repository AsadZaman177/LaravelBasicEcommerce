<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('login');
    }


   function login(Request $request){

    $request -> validate(
        [
            'email' => 'required|string',
            'password' => 'required|string',
        ]
    );


    $user = User::where(['email'=>$request->email])->first();



    if(!$user || !Hash::check($request->password,$user->password)){

        return back()
        -> with('error', 'Invalid Credentials');
    }

    else {
        $request->session()->put('user',$user);
        return redirect('/');
    }

   }
}
