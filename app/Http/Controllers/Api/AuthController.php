<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    public function login(Request $request) {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        //check user if exist
        $user = User::where('email', $request->email)->first();

        //check if the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        //generate token
        $token = $user->createToken('auth-token')->plainTextToken;

        return response([
            'user'  => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message'   => 'Logged out successfully'
        ], 200);
    }
}
