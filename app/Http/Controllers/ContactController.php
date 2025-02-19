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

    

    //get all contacts
    public function index(){
        $contacts = $this->contact->paginate(10);
        return view('admin.contacts.ContactManagement',compact('contacts'));
    }

    //Add contact to database
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
