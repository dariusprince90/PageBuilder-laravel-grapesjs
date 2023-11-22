<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

class EmailVerifyController extends Controller
{
    public function verify($code)
    {
        $user = User::where('verify_code', $code)->first();

        if ($user) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect()->route('home');
        }
    }
}
