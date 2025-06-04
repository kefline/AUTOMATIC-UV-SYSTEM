<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function getMessages(Request $request)
    {
        $user = Auth::user();
        $query = Message::with(['sender', 'receiver'])
            ->where(function($q) use ($user) {
                $q->where('sender_id', $user->id)
                  ->orWhere('receiver_id', $user->id);
            });

        // If a specific chat partner is specified
        if ($request->has('user_id')) {
            $partnerId = $request->input('user_id');
            $query->where(function($q) use ($user, $partnerId) {
                $q->where(function($inner) use ($user, $partnerId) {
                    $inner->where('sender_id', $user->id)
                          ->where('receiver_id', $partnerId);
                })->orWhere(function($inner) use ($user, $partnerId) {
                    $inner->where('sender_id', $partnerId)
                          ->where('receiver_id', $user->id);
                });
            });
        }

        $messages = $query->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'read' => false
        ]);

        $message->load('sender', 'receiver');
        
        // Broadcast the new message
        broadcast(new NewMessage($message))->toOthers();

        return response()->json($message);
    }

    public function markAsRead(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id'
        ]);

        Message::where('sender_id', $request->sender_id)
            ->where('receiver_id', Auth::id())
            ->where('read', false)
            ->update(['read' => true]);

        return response()->json(['success' => true]);
    }

    public function getUsers()
    {
        $users = User::where('id', '!=', Auth::id())
            ->whereHas('role', function($query) {
                $query->where('name', '!=', 'admin');
            })
            ->get();

        return response()->json($users);
    }

    public function getAdmins()
    {
        $admins = User::whereHas('role', function($query) {
            $query->where('name', 'admin');
        })->get();

        return response()->json($admins);
    }
} 