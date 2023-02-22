<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return view("pages.event.index",["event"=>$event]);
    }
}
