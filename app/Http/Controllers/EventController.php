<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Tarif;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Models\PromoterEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $events = Event::where("status","validated")->get();
        return view("pages.event.index",["events"=>$events]);
    }
    public function show(Event $event)
    {
        $users = User::all();
        $tickets = Ticket::all();
        $types = TypeTicket::all();
        $tarifs = Tarif::all();
        $events = Event::where("status","validated")->get();
        return view("pages.event.index",["event"=>$event, 'tarifs'=>$tarifs, 'users'=>$users, 'types'=>$types]);
    }
}
