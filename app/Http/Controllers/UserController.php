<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; 

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Generate a random password
        $plainPassword = Str::random(12);
        $hashedPassword = Hash::make($plainPassword);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role_id' => $request->role_id,
        ]);

        Mail::to($user->email)->send(new \App\Mail\UserRegisteredWithCredentialsMail($user, $plainPassword));

        return redirect()->route('users.index')->with('success', 'User registered successfully and login details sent!');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }


    public function RegistrationForm()
    {
        $roles = Role::all();
        return view('users.add', compact('roles'));
    }

    public function add_users(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role_id = 2;
        $user->save();

        

        return redirect()->route('Admin.index')->with('success', 'User created successfully!');
    }
}