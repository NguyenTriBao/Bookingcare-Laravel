<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    //
    public function talkToBot(Request $request){
        $message = $request->input("message");
        $response = Http::post('http://localhost:5005/webhooks/rest/webhook', [
            'message' => $message
        ]);
        return response()->JSON($response->json());
    }
}
