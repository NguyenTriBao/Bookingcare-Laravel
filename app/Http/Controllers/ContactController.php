<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    private $contact;

    public function __construct(Contact $contact){
        $this->contact = $contact;
    }

    public function sendContact(Request $request){
        $this->contact->create([
            'name'    => $request->name,
            'email'   => $request->email,
            'title'   => $request->title,
            'message' => $request->message
        ]);
        return response()->json(['success' => true]);
    }

}
