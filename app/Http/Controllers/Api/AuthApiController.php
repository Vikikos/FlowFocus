<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function signup(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('main')->plainTextToken;

        Auth::login($user);
        return response([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('token-api')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => new UserResource($user)
            ]);
        }

        return response()->json(['message' => 'Credenciales no validas'], 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Sesión cerrada exitosamente']);
        }
    }
}
