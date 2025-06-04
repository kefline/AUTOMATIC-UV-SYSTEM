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
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('Admin.index');
        }
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
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

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token)
    {
        return view('Auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function h3ello()
    {
        return response()->json(['message' => 'Hello, are you confused?']);
    }
}
