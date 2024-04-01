<?php

namespace App\Http\Controllers\Provider\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){

        $credential =$request->only('email','password');
        $user =Auth::guard('provider-api')->attempt($credential);
        if(!$user)
            return response()->json(['message'=>'Invalid login or password.'],401);

        $user = auth('provider-api')->user();
        $token = $user->createToken('user_token')->accessToken ;
        $user->api_token =$token ;
        return response()->json(['data'=>$user]);
    }


    public function logout(){
            auth()->guard('user')->user()->token()->revoke();
            return response()->json(['message'=>'logout successfully']);
        }


}
