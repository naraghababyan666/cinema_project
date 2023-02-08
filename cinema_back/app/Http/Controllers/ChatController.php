<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;

class ChatController extends Controller
{
    public function rooms(Request $request)
    {
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomId)
    {
        return ChatMessage::where('chat_room_id', $roomId)
            ->with('user')
            ->get();
    }

    public function newMessage(Request $request)
    {
        $newMessage = new ChatMessage();
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = 1;
        $newMessage->message = $request['message'];
        $newMessage->save();
        broadcast(new NewChatMessage($newMessage['id'], $newMessage['message']))->toOthers();
        return response()->json($newMessage);
    }

}
