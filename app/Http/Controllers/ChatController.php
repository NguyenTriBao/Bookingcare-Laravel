<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    private $message;

    public function __construct(Message $message){
        $this->message = $message;
    }

    public function sendMessage(Request $request){
        $doctorId = Auth::id();
        $message = $this->message->create([
            'doctorId' => $doctorId,
            'message' => $request->message
        ]);
        $message = $this->message->with('user.doctor')->find($message->id);
        
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function getMessages(){
        $messages = $this->message->with('user.doctor')->orderBy('created_at','asc')->get();

        return response()->json($messages);
    }
}