<?php

namespace App\Http\Controllers\company\auth;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Http\Request;

class registerController extends Controller
{

  
    public function register(Request $request)
    {
        $this->validate($request,[
            'comp_name'=>'required|min:3|max20',
            'phone'=>'required|min:3|max20',
            'logo'=>'required|min:3|max20',
            'location'=>'required',
            'email'=>'required|email|unique:company',
            'password'=>'required|min:3|max:20'
        ]);
        $company = company::create([
            'comp_name' => $request->firstname,
            'phone' => $request->lastname,
            'logo'=>$request->phone,
            'location'=>$request->location,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
        ]);
        $token = $company->createtoken('company_token')->plainTextToken;
        return response()->json([
            'company'=>$company,
            'token'=>$token    
        ],200);
    }
}
