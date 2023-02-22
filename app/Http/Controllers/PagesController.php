<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        return view("index");
    }

    public function dashboard(){
        $role = Auth::user()->role;
        if($role=="Admin"){
            return redirect()->route("admin.index");
        }elseif ($role=="Promoter") {
            return redirect()->route("promoter.index");
        }else{
            return redirect()->route("index");
        }
    }

    public function events(){
        $events = Event::where("status","validated")->get();
        return view("pages.event.event-list",["events"=>$events]);
    }

    // public function event(Event
}
