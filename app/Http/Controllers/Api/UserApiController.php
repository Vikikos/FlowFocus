<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getSessionData(Request $request)
    {

        $user = $request->user();

        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return (new userResource($user));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
