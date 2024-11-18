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
        // Validate the email address
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Retrieve the user by their email address
        $user = User::where('email', $request->email)->first();

        // Generate a new random password
        $newPassword = Str::random(8); // Generate a random 8-character password

        // Update the user's password in the database
        $user->update([
            'password' => Hash::make($newPassword), // Always hash the password before saving
        ]);

        // Send the new password via email
        Mail::to($user->email)->send(new PasswordResetMail($user, $newPassword));

        // Return a success message to notify the user
        return back()->with('success', 'A new password has been sent to your email address.');
    }
}
