<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'sender_role' => 'required|in:admin,customer',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_role' => $request->sender_role,
            'message' => $request->message,
        ]);

        return response()->json(['status' => 'Message sent']);
    }

    public function messages()
    {
        return Chat::orderBy('created_at')->get();
    }
}
