<?php

namespace App\Http\Controllers\Sanctum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status != Password::RESET_LINK_SENT)
        {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        // __($status) локализованная строка из директории lang
        // чтобы она появилась выполнить
        // sudo ./vendor/bin/sail artisan lang:publish
        return response(['status' => __($status)]);
    }
}
