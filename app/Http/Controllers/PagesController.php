<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Models\PromoterEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        $events = Event::where("status","validated")->limit(8)->get();
        // dd($events);
        return view("index",["events"=>$events]);
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
        $users = User::all();
        $tickets = Ticket::all();
        $types = TypeTicket::all();
        $events = Event::where("status","validated")->get();
        return view("pages.event.event-list",["events"=>$events,'tickets'=>$tickets, 'users'=>$users, 'types'=>$types]);
    }

    // public function event(Event
    public function reservationStore(Request $request){
        $reservation = Reservation::create([
            "event_id"=>$request->event_id,
            "user_id"=>$request->user_id,
            "ticket_id"=>$request->ticket_id
        ]);
        return back()->with("success","Reservation enregistré avec succès !");
    }
}
