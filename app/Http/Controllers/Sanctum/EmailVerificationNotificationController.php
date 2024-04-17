<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request)
    {
        if($request->user()->hasVerifiedEmail())
        {
            return response(['message' => 'Email has been verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        return response(['message' => 'A new link has been sent to your email']);
    }

}
