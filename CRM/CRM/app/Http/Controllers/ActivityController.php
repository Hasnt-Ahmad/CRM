<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Contact;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function displayActivity(){
        $activities=Activity::join("contacts","activities.contact_id","=","contacts.id")->where("activities.status","=","1")->get();
        return view("activity",['activities'=> $activities]);
    }
    public function showActivity(){
        $contacts=Contact::all();
        return view("addActivity",['contacts'=> $contacts]);
    }
    public function addActivity(Request $request){
        $request->validate([

            'contact_name'=> 'required',
            'activity_type'=> 'required',
            'description'=> 'required',
        ]);

        $activity=new Activity;
        $activity->contact_id=request("contact_name");
        $activity->activity_type=request("activity_type");
        $activity->description=request("description");
        $activity->status=1;
        $activity->save();
        session(["activity"=>'added']);
        return redirect("/activity");
    }
    public function editActivity($id){
        $activity=Activity::find($id);
        return view("editActivity",["acitivity"=>$activity]);
    }
    public function updateActivity($id){
        $activity=Activity::find($id);
        $activity->status=request("status");
        $activity->save();
        session(["activity"=>"updated"]);
        return redirect("/activity");
    }
    public function displayActivityLog(){
        $activities=Activity::join("contacts","activities.contact_id","=","contacts.id")->where("activities.status","=","0")->get();
        return view("activityLog",['activities'=> $activities]);
    }
}
