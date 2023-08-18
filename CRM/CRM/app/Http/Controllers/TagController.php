<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function displayTag(){
        $contacts=Contact::all();
        return view("addTag",["contacts"=>$contacts]);
    }
    public function addTag(Request $request){
        $request->validate([

            'contact_name'=> 'required',
            'tag_name'=> 'required',
        ]);

        $tag=new Tag;
        $tag->contact_id=request("contact_name");
        $tag->tag_name=request("tag_name");
        $tag->save();
        session(["tag"=>'added']);
        return redirect("home");
    }
}
