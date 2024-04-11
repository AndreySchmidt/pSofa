<?php

namespace App\Http\Controllers\Sanctum\PersonalAccessTokenController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use Laravel\Sanctum\PersonalAccessToken;

class PersonalAccessTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' =>  'required|email',
            'password' =>  'required',
            'device_name' =>  'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($user->password, $request->password))
        {
            throw ValidationException::withMessages([
                'email' => 'Not valid auth data' 
            ]);
        }

        // Accept/application/json
        // Authorization Bearer token
        // return ['token' => $user->createToken($request->device_name, ['comment:update', 'comment:delete'])->plainTextToken];

        return json_encode(['token' => $user->createToken($request->device_name, ['comment:update', 'comment:delete'])->plainTextToken]);
    }
    
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        // public function destroy(PersonalAccessToken $token, Request $request)
        // $token->delete();
        // $request->user()->tokens()->where('id', $tokenId)->delete();
    }

}
