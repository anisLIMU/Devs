<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
 
class registerController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required|min:3|max20',
            'lastname'=>'required|min:3|max20',
            'phone'=>'required|min:3|max20',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|max:20'
        ]);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone'=>$request->phone,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
        ]);
        $token = $user->createtoken('user_token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token    
        ],200);
    }
}
