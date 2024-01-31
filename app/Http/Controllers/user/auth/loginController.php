<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response([
                'message' => 'Failed to authenticate',
            ], 401);
        }
        return response([
            'user' => auth()->guard('user')->user(),
            'token' => auth()->guard('user')->user()->createToken('user_token')->plainTextToken 
         ], 200);
    }
    public function logout() {

        Auth::user()->tokens()->delete();
        
        return response([
            'message' => 'User tokens deleted successfully',
        ], 200);
    }
}