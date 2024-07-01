<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Other methods...

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Redirect to the login page with an optional message
        return redirect()->route('login')->with('message', 'You have been logged out.');
    }
}