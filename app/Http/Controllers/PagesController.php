<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view("pages.event.event-list");
    }

    // public function event(Event
}
