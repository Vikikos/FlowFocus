<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
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

        Auth::login($user);
        return (new UserResource($user));
    }

    public function login(UserRequest $request) 
    {
        $credentials = $request->only('userName','password');
        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return response()->json(['message' => 'Logueado con éxito']);
        } 

        return response()->json(['message' => 'Error'], 401);
    }

    public function logout(UserRequest $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }
}
