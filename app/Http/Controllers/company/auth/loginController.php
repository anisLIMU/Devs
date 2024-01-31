<?php

namespace App\Http\Controllers\company\auth;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response([
                'message' => 'Failed to authenticate',
            ], 401);
        }
        return response([
            'user' => auth()->guard('company')->user(),
            'token' => auth()->guard('company')->user()->createToken('company_token')->plainTextToken,
            'token_type' => 'Bearer',
        ], 200);
    }
    public function logout() {

        Auth::user()->tokens()->delete();
        
        return response([
            'message' => 'company tokens deleted successfully',
        ], 200);
    }
}
