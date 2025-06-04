<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'current_password' => ['nullable', 'required_with:new_password'],
            'new_password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        // Verify current password if trying to change password
        if ($request->current_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'notification_preferences' => ['nullable', 'array'],
            'theme_preference' => ['nullable', 'string', 'in:light,dark'],
            'language' => ['nullable', 'string'],
        ]);

        // Update user settings
        $user->settings()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'notification_preferences' => $request->notification_preferences,
                'theme_preference' => $request->theme_preference,
                'language' => $request->language,
            ]
        );

        return back()->with('success', 'Settings updated successfully.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'max:2048'] // 2MB Max
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Store new photo
        $path = $request->file('photo')->store('profile-photos', 'public');
        $user->profile_photo = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully.');
    }
} 