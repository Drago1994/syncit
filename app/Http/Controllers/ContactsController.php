<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function showContactNumbers($id){
        $contact = Contact::find($id);
        $allContacts = Contact::all();
        // dd($contact->numbers()->get()[0]['label']);

        return view('contact_list')->with('contact', $contact);
    }

}
