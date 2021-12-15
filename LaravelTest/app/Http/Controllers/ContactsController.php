<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Number;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function showContactNumbers($id){
        $contact = Contact::find($id);
        $allContacts = Contact::all();


        return view('contact_list')->with('contact', $contact);
    }

    public function getContacts(){
        $allContacts = Contact::all();
        $contactList = [];

        foreach($allContacts as $contact){
            array_push($contactList,[
                'id' =>  $contact['id'],
                'firstname' => $contact['firstname'],
                'lastname' => $contact['lastname'],
                'numbers' => $contact->numbers()->get()
            ]);
        }

        return response()->json($contactList);


    }

    public function save(Request $req){
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln('save');

        Schema::disableForeignKeyConstraints();
        Number::truncate();
        Contact::truncate();
        Schema::enableForeignKeyConstraints();


        $contacts = $req->input('contacts');
        foreach ($contacts as $contact){

            $person = new Contact;

            $out->writeln($contact['firstname']);
            $person->firstname = $contact['firstname'];

            $out->writeln($contact['lastname']);
            $person->lastname = $contact['lastname'];

            $person->save();
            $contact_id = $person->id;

            $numbersList = [];

            foreach($contact['numbers'] as $number){
                $num = new Number;
                $num->contact_id =  $contact_id;
                $num->label =  $number['label'];
                $num->number =  $number['number'];
                $num->save();
            }
            $person->numbers()->saveMany($numbersList);
        }

        return response()->json(['saved'=>true]);
    }

}
