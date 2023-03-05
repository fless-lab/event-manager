<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\TypeTicket;
use App\Models\Ticket;
use App\Models\EventCategory;

class TypeTicketController extends Controller
{
    public function typeIndex(){
        $events = Event::all();
        $types = TypeTicket::all();
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        return view("pages.dashboard.promoter.tes",["events"=>$events,"promoters"=>$promoters,'categories'=>$categories,'types'=>$types]);
    }


    public function typeStore(Request $request){

        /* dd($request);*/
        $type = TypeTicket::create([
            "event_id"=>$request->event_id,
            "price"=>$request->price,
        ]);

        return back()->with("success","Type de ticket enregistré avec succès !");
    }

    public function typeUpdate(Request $request,TypeTicket $type){

        $type->update([
            "event_id"=>$request->event_id??$type->event_id,
            "price"=>$request->price??$type->price,
        ]);

        return back()->with("success","Type de ticket enregistré avec succès !");
    }
    public function typeDelete(TypeTicket $type){
        $type->delete();
        return redirect()->back()->with("success","Type de ticket supprimée avec succès !");
    }





    // Manage ticket
    public function ticketStore(Request $request){

        //dd($request);
        $type = Ticket::create([
            "type_id"=>$request->type_id,
            "name"=>$request->name,
            "number"=>$request->number,
        ]);

        return back()->with("success","Ticket enregistré avec succès !");
    }

    public function ticketUpdate(Request $request,Ticket $ticket){

        $type->update([
            "type_id"=>$request->type_id??$ticket->type_id,
            "name"=>$request->name??$ticket->name,
            "number"=>$request->number??$ticket->number,
        ]);

        return back()->with("success","Ticket enregistré avec succès !");
    }
    public function ticketDelete(Ticket $ticket){
        $ticket->delete();
        return redirect()->back()->with("success","Type de ticket supprimée avec succès !");
    }
}
