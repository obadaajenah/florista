<?php

namespace App\Http\Controllers\Provider\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterEmpRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterEmpRequest $request ){

        $user= Provider::create($request->validated());
         $token = $user->createToken('provider_token')->accessToken;
         return response()->json(['user' => $user, 'access_token' => $token], 200);

        }
}
