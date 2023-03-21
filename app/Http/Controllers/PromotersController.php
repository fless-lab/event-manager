<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
use App\Models\Tarif;
use Illuminate\Support\Facades\Auth;

class PromotersController extends Controller
{
    public function index(){
        $a = Auth::user()->id;
        $events = Event::where("status","validated")->get();
        // $events = Event::paginate(8);
        $total_reservation = count(Reservation::join('events','events.id', '=', 'reservations.event_id')
                                                    ->where("promoter_id","$a")
                                                    ->get());
        $users = User::all();
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        $revenu = Tarif::join('events','events.id', '=', 'tarifs.event_id')
                            ->where("promoter_id","$a")
                            ->sum("price");
        $total_events = count(Event::where("promoter_id", "$a")->get());
        $reservations = Reservation::all();


        return view("pages.dashboard.promoter.index",["events"=>$events, "reservations"=>$reservations, "users"=>$users, "promoters"=>$promoters,'categories'=>$categories, 'total_reservation'=>$total_reservation, 'total_events'=>$total_events,'revenu'=>$revenu]);
        
        
    }
    public function typeIndex(){
        $a = Auth::user()->id;
        $events = Event::where("status","validated")->get();
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        $types = TypeTicket::all();
        $tarifs = Tarif::all();
        $reservations = Reservation::where("user_id","$a")->get();
        $reservations = Reservation::paginate(5);
        $users = User::all();



        return view("pages.dashboard.promoter.type",["events"=>$events,'users'=>$users,'types'=>$types, 'reservations'=>$reservations, 'tarifs'=>$tarifs]);
    }

    public function eventsIndex(){
        $events = Event::paginate(4);
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
    public function reservationDelete(Reservation $reservation){
        $reservation->delete();
        return redirect()->back()->with("success","Reservation supprimée avec succès !");
    }

    public function search(Request $request)
    {
        $a = Auth::user()->id;
        $total_events = count(Event::all());
        $total_reservation = count(Reservation::join('events','events.id', '=', 'reservations.event_id')
                                                    ->where("promoter_id","$a")
                                                    ->get());
        $promoters = User::where("role_id",2)->get();
        $revenu = Tarif::join('events','events.id', '=', 'tarifs.event_id')
                            ->where("promoter_id","$a")
                            ->sum("price");
        $categories = EventCategory::all();
        
        $events = Event::where([
            ["title","!=", Null],
            [function($query) use ($request){
                if($name = $request->name){
                    $query->orwhere('title', 'Like', '%'.$name.'%')->get();
                }
            }]
        ])->get();
        // $events = Event::paginate(8);
        return view("pages.dashboard.promoter.index", ["events"=>$events, 'revenu'=>$revenu,"promoters"=>$promoters,'categories'=>$categories, 'total_reservation'=>$total_reservation, 'total_events'=>$total_events]);
        
    }
    public function search2(Request $request)
    {
        $a = Auth::user()->id;
        $total_events = count(Event::all());
        $total_reservation = count(Reservation::all());
        $reservations = Reservation::all();
        $revenu = Tarif::join('events','events.id', '=', 'tarifs.event_id')
                            ->where("promoter_id","$a")
                            ->sum("price");
        $tarifs = Tarif::all();
        $users = User::all();
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        $events = Event::where([
            ["title","!=", Null],
            [function($query) use ($request){
                if($name = $request->name){
                    $query->orwhere('title', 'Like', '%'.$name.'%')->get();
                }
            }]
        ])->get();
        return view("pages.dashboard.promoter.type", ["events"=>$events, 'revenu'=>$revenu, "promoters"=>$promoters,'categories'=>$categories, 'total_reservation'=>$total_reservation, 'total_events'=>$total_events, 'reservations'=>$reservations, 'tarifs'=>$tarifs,'users'=>$users]);
        
    }
}