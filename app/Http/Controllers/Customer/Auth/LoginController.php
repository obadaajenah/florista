<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){

        $credential =$request->only('email','password');
        $user =Auth::guard('user-api')->attempt($credential);
        if(!$user)
            return response()->json(['message'=>'Invalid login or password.'],401);

        $user = auth('user-api')->user();
        $user->api_token = $user->createToken('user_token')->accessToken ;
        return response()->json(['data'=>$user]);
    }




public function logout(){
       auth()->guard('user')->user()->token()->revoke();
        return response()->json(['message'=>'logout successfully']);
    }
}
