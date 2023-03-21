<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\Tarif;
use App\Models\TypeTicket;
use App\Models\PromoterEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        $events = Event::where("status","validated")->limit(9)->get();
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
        $tarifs = Tarif::all();
        $events = Event::where("status","validated")->get();
        return view("pages.event.event-list",["events"=>$events,'tarifs'=>$tarifs, 'users'=>$users, 'types'=>$types]);
    }

    // public function event(Event
    public function reservationStore(Request $request){
        $reservation = Reservation::create([
            "event_id"=>$request->event_id,
            "user_id"=>$request->user_id,
            "tarif_id"=>$request->tarif_id
        ]);
        return redirect()->route('promoter.tarif.pdf');
        return to_route('index');
    }

    public function search(Request $request)
    {
        $users = User::all();
        $tarifs = Tarif::all();
        $events = Event::where([
            ["title","!=", Null],
            [function($query) use ($request){
                if($name = $request->name){
                    $query->orwhere('title', 'Like', '%'.$name.'%')->get();
                }
            }]
        ])->get();
        return view("pages.event.event-list", ["events"=>$events,'tarifs'=>$tarifs, 'users'=>$users]);  
    }
    public function share()
    {

        $date = [
            'id'=> 1,
            'title'=>'The title',
        ];


        $sharebuttons = \Share::page(
            'http://jorenvanhocht.be','title'
        )->facebook()
        ->twitter()
        ->linkedin('Extra linkedin summary can be passed here')
        ->whatsapp();

        return view('pages.event.event-list',['sharebuttons'=>$sharebuttons]);
    }
}
