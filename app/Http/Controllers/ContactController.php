<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function apanelContact(){
        $contact = Contact::where('id', 1)->first();
        return view('backEnd.contact-address.contactaddress', ['contact' => $contact]);
    }
    protected function contactValidation($request){
        $request->validate([
            'head_office' => 'required',
            'branch_office' => 'required',
            'email' => 'required',
            'map' => 'required',
        ]);
    }
    public function apanelUpdateContact(Request $request){
//        return $request;
        $this->contactValidation($request);
        $contact = Contact::where('id', 1)->first();
        $contact->head_office = $request->head_office;
        $contact->branch_office = $request->branch_office;
        $contact->email = $request->email;
        $contact->map = $request->map;
        $contact->map_banani = $request->map_banani;
        $contact->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Contact Info Updated Successfully !!!');
        return back();
    }
}
