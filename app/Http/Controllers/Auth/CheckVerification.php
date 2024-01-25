<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckVerification extends Controller
{
    public function isEmailVerified(Request $request)
    {
        // validate request data
        $request->validate([
            'email' => ['required', 'email']
        ]);

        // check if email is verified
        $user = User::where('email', $request->email)->whereNotNull('email_verified_at')->first();

        return $user ? true : false;
    }
}
