<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

use App\Mail\PasswordResetMail;

class AuthController extends Controller
{

    public function login()
    {
        $roles = Role::all();
        return view('Auth.login', compact('roles'));
    }


    public function authenticate(Request $request)

    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::where('email', $request->email)
            ->where('role_id', $request->role_id)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('index');
        }

        return back()->withErrors(['error' => 'Invalid email, password, or role.']);
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

    public function h3ello()
    {
        return response()->json(['message' => 'Hello, are you confused?']);
    }
}
