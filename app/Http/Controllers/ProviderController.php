<?php

namespace App\Http\Controllers;

use App\Contracts\ApiResponse;
use App\Http\Requests\RegisterEmpRequest;
use App\MOdels\Provider;
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


    public function login(loginRequest $request)
    {

        $credential = $request->only('email', 'password');
        $user = Auth::guard('pro-api')->attempt($credential);
        if (!$user)
            return response()->json(['message' => 'Invalid login or password.'], 401);

        $user = Provider::where('email', $request->email)->first();
        $token = $user->createToken('user_token')->accessToken;
        $user->api_token = $token;
        return response()->json(['data' => $user]);
    }


    public function logout()
    {
        //    $user= Auth::guard('user');
        //    $user->token()->revoke();

        // auth()->guard('user')->user()->token()->revoke();
        //    $user = Auth::user()->token();
        //    $user->revoke();
        return response()->json(['message' => 'logout successfully']);
    }


    public function store(StoreAddWorkFormRequest $request)
    {
        $validatedData = $request->validated();
        $post = WorkProvider::create($validatedData);

        if ($request->hasFile('image')) {
            $fileName = 'posts-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('Posts', $fileName, 'public');
            $post->storeImage($fileName, $path); // Passing both image name and path
            $imageUrl = URL::to('/') . '/storage/' . $path;
            $post->imageUrl = $imageUrl;
        }
        return ApiResponse::success([

            'post' => PostResource::make($post)
        ]);
    }


    public function index()
    {
        $provider = Provider::all();
        return ApiResponse::success(['providers' => $provider]);
    }


    public function myProfile($id)
    {
        $provider = Provider::with('posts')->findOrFail($id);
        return ApiResponse::success([
            'details' => ProviderResource::make($provider),
        ]);
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
