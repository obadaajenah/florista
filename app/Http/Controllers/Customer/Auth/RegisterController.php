<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request ){

        $user= User::create($request->validated());
         $token = $user->createToken('user_token')->accessToken;
         return response()->json(['user' => $user, 'access_token' => $token], 200);

        }
}
