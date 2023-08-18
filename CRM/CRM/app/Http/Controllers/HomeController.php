<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Contact;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contact=count(Contact::all());
        $activity=count(Activity::where("status","=","1")->get());
        $activityLog=count(Activity::where("status","=","0")->get());
        $tag=count(Tag::all());
        return view('home',["contact"=>$contact,"activity"=>$activity,"activityLog"=>$activityLog,"tag"=>$tag]);
    }
}
