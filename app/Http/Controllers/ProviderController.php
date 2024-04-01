<?php

namespace App\Http\Controllers;

use App\Contracts\ApiResponse;
use App\Http\Requests\RegisterEmpRequest;
use App\Models\Provider;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Posts\StoreAddWorkFormRequest;
use App\Models\WorkProvider;
use App\Http\Resources\Providers\PostResource;
use App\Http\Resources\Providers\ProviderResource;
use App\Contracts\Images;
use Illuminate\Support\Facades\URL;

class ProviderController extends Controller
{
    use Images;

    public function register(RegisterEmpRequest $request)
    {

        $user = Provider::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('provider_token')->accessToken;
        return response()->json(['user' => $user, 'access_token' => $token], 200);
    }


 




    public function posts()
    {
        $provider = WorkProvider::all();
        return ApiResponse::success([

            'providers' => PostResource::collection($provider)
        ]);
    }


    public function updateProfile(RegisterEmpRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $validatedData = $request->validated();

        $provider->update($validatedData);

        return ApiResponse::success([
            'message' => 'Profile updated successfully',
            'details' => $provider
        ]);
    }
}
