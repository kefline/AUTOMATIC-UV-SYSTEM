<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\PasswordResetMail;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('index');
        }

        return back()->withErrors(['error' => 'Invalid email or password.']);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('Auth.login');
    }


    public function showForgotPasswordForm()
    {
        return view('Auth.forgot-password');
    }


    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $newPassword = Str::random(8); 
        $user->update([
            'password' => Hash::make($newPassword), 
        ]);

        Mail::to($user->email)->send(new PasswordResetMail($user, $newPassword));

        return back()->with('success', 'A new password has been sent to your email address.');
    }
}
