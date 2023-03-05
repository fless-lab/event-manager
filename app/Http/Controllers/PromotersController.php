<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
use App\Models\EventCategory;
use App\Models\PromoterEvent;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use App\Models\TypeTicket;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class PromotersController extends Controller
{
    public function index(){
        $events = Event::where("status","validated")->get();
        $total_events = count(Event::all());
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        $types = TypeTicket::all();



        return view("pages.dashboard.promoter.index",["events"=>$events,"promoters"=>$promoters,'categories'=>$categories,'total_events'=>$total_events,'types'=>$types]);
    }
    public function typeIndex(){
        $events = Event::where("status","validated")->get();
        $total_events = count(Event::all());
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        $types = TypeTicket::all();
        $tickets = Ticket::all();
        $reservations = Reservation::all();
        $users = User::all();



        return view("pages.dashboard.promoter.type",["events"=>$events,'users'=>$users,'types'=>$types, 'reservations'=>$reservations, 'tickets'=>$tickets]);
    }

    public function eventsIndex(){
        $events = Event::paginate(2);
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        return view("pages.dashboard.promoter.manage-events",["events"=>$events,"promoters"=>$promoters,'categories'=>$categories]);
    }
    public function eventsStore(Request $request){
        $start_date = $request->input('start_date');
        $start_time = $request->input('start_time');
        $end_date = $request->input('end_date');
        $end_time = $request->input('end_time');

        // Merge the start date and time values into a single datetime string
        $start_datetime = date('Y-m-d H:i:s', strtotime("$start_date $start_time"));
        $end_datetime = date('Y-m-d H:i:s', strtotime("$end_date $end_time"));

        // Convert the datetime strings into Unix timestamps
        $start_timestamp = strtotime($start_datetime);
        $end_timestamp = strtotime($end_datetime);

        if($start_timestamp>$end_timestamp){
            return back()->with("error","La date de début ne peux pas être supérieur à la date de fin");
        }

        // dd($start_timestamp,$end_timestamp);
        $event = Event::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "place"=>$request->place,
            "promoter_id"=>$request->promoter_id,
            "category_id"=>$request->category_id,
            "start_date"=>$start_timestamp,
            "end_date"=>$end_timestamp,
        ]);

        if($request->cover){
            $coverNewName = "event-cover-".Str::uuid().".".$request->cover->extension();
            $request->cover->move(public_path("images/uploads/events/covers"),$coverNewName);
            $event->update(["cover"=>$coverNewName]);
        }

        return back()->with("success","Evenement enregistré avec succès !");
    }
    public function eventsUpdate(Request $request,Event $event){
        $start_date = $request->input('start_date');
        $start_time = $request->input('start_time');
        $end_date = $request->input('end_date');
        $end_time = $request->input('end_time');

        // Merge the start date and time values into a single datetime string
        $start_datetime = date('Y-m-d H:i:s', strtotime("$start_date $start_time"));
        $end_datetime = date('Y-m-d H:i:s', strtotime("$end_date $end_time"));

        // Convert the datetime strings into Unix timestamps
        $start_timestamp = strtotime($start_datetime);
        $end_timestamp = strtotime($end_datetime);

        if($start_timestamp>$end_timestamp){
            return back()->with("error","La date de début ne peux pas être supérieur à la date de fin");
        }
        $event->update([
            "title"=>$request->title??$event->title,
            "description"=>$request->description??$event->description,
            "place"=>$request->place??$event->place,
            "promoter_id"=>$request->promoter_id??$event->Auth()->User()->id(),
            "category_id"=>$request->category_id??$event->category_id,
            "start_date"=>$start_timestamp??$event->start_date,
            "end_date"=>$end_timestamp??$event->end_date,
        ]);

        if($request->cover){
            $updatedCoverNewName = "event-cover-".Str::uuid().".".$request->cover->extension();
            $request->cover->move(public_path("images/uploads/events/covers"),$updatedCoverNewName);
            $event->update(["cover"=>$updatedCoverNewName]);
        }

        return back()->with("success","Evenement enregistré avec succès !");
    }
    public function eventsDelete(Event $event){
        $event->delete();
        return redirect()->back()->with("success","Evenement supprimée avec succès !");
    }


}
