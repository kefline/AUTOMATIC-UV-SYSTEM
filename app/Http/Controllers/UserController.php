<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function list()
    {
        return view('users.list');
    }

    public function RegistrationForm()
    {

        return view('users.add');
    }
    public function add_users(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',

        ]);

        $defaultPassword = 'password123';
       $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($defaultPassword),

        ]);
        Mail::to($user->email)->send(new \App\Mail\UserRegisteredMail($user, $defaultPassword));

        return redirect()->route('users.add')->with('success', 'Registration successful!');
    }
}
