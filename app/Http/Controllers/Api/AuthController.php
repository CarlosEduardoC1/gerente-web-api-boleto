<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);

        if(!$token = Auth::attempt($credentials)){
            return response()->json(['error' => 'Unauthorized', 'status' => 401]);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token){
        return response()->json([
            'token' => $token
        ]);
    }
}
