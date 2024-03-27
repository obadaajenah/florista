<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\MOdels\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;
use Laravel\Passport\HasApiTokens;

class CustomerController extends Controller
{

    public function register(RegisterRequest $request ){

        $user= User::create([
             'first_name'=>$request->first_name,
             'last_name'=>$request->last_name,
             'phone'=>$request->phone,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),
         ]);

         $token = $user->createToken('user_token')->accessToken;
         return response()->json(['user' => $user, 'access_token' => $token], 200);

        }




        public function login(loginRequest $request){

            $credential =$request->only('email','password');
            $user =Auth::guard('user-api')->attempt($credential);
            if(!$user)
                return response()->json(['message'=>'Invalid login or password.'],401);

            $user =User::where('email',$request->email)->first();
            $token = $user->createToken('user_token')->accessToken ;
            $user->api_token =$token ;
            return response()->json(['data'=>$user]);
        }




    public function logout(){
        //    $user= Auth::guard('user');
        //    $user->token()->revoke();

           // auth()->guard('user')->user()->token()->revoke();
        //    $user = Auth::user()->token();
        //    $user->revoke();
            return response()->json(['message'=>'logout successfully']);

        }


}
