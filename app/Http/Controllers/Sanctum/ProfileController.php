<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return request()->user();
    }

    public function update(Request $request)
    {
        $user = request()->user();

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['confirmed', Password::defaults()],
            // password_confirmation
        ]);

        $user->fill($attributes)->save();

        return response()->noContent();
    }

}
