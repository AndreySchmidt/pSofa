<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class LoginUserController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($credentials))
        {
            // regenerate session (cookie+csrf) not necessary
            $request->session()->regenerate();

            return response($request->user(), Response::HTTP_CREATED);
        }

        return response([
            'email' => 'Wrong email / password'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->noContent();
    }

}
