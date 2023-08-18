<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    //
    public function addContact(Request $request){

        $request->validate([

            'user_name'=> 'required',
            'user_email'=> 'required|email',
            'user_number' =>'required',
             'user_company' => 'required'
        ]);

        $contact=new Contact;
        $contact->user_id=Auth::user()->id;
        $contact->contact_name=request("user_name");
        $contact->contact_email=request("user_email");
        $contact->phone_number=request("user_number");
        $contact->company=request("user_company");
        $contact->save();
        session(['contact'=>"added"]);
        return redirect("/contacts");
    }

    public function displayContact(Request $request){


        if(request('search')){
            $contacts= Contact::where('contact_name', 'like', '%' . request("search") . '%')
            ->orWhere('company', 'like', '%' . request("search") . '%')->get();
            return view("contact",['contacts'=> $contacts]);
        }

        $contacts=Contact::all();
        return view("contact",['contacts'=> $contacts]);
    }

    public function editContact(Request $request,$id){

        $contact=Contact::find($id);
        return view("editContact",["contact"=>$contact]);
    }

    public function updateContact(Request $request,$id){

        $request->validate([

            'user_name'=> 'required',
            'user_email'=> 'required|email',
            'user_number' =>'required',
             'user_company' => 'required'
        ]);

        $contact=Contact::find($id);
        $contact->contact_name=request("user_name");
        $contact->contact_email=request("user_email");
        $contact->phone_number=request("user_number");
        $contact->company=request("user_company");
        $contact->save();
        session(['contact'=>"updated"]);
        return redirect("/contacts");
    }

    public function deleteContact(Request $request,$id){

        $contact=Contact::find($id);
        $contact->delete();
        session(["contact"=>"deleted"]);
        return redirect("/contacts");
    }

    public function exportContact(){
        return Excel::download(new ContactExport, 'contact.xlsx');
    }
}
