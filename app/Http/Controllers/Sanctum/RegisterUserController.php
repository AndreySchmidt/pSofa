<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            // password_confirmation
        ]);


        $user = User::create($attributes);

        // создаем событие регистрации (глобальное событие регистрации пользователя)
        event(new Registered($user));

        Auth::login($user);

        return response([
            'message' => 'Thanks for registration, verify your email'
        ], Response::HTTP_CREATED);
        // return response($user, Response::HTTP_CREATED);
    }
    
    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return response()->noContent();
    }

}
