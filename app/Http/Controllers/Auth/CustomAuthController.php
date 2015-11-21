<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomAuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $user_id = User::where('email', $email)->first();
        $user_id = $user_id['user_id'];

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Could not sign you in with those details. Please try again.');
        }

        return redirect()->intended('suite');

    }

}
