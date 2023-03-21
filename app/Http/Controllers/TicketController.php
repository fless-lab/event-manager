<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Reservation;
use App\Models\TypeTicket;
use App\Models\Ticket;
use App\Models\Tarif;
use App\Models\EventCategory;
use PDF;

class TicketController extends Controller
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

    // Manage of tarifs
    public function tarifStore(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if($start_date > $end_date ){
            return back()->with("error","La date de début ne peux pas être supérieur à la date de fin");
        }
        Tarif::create($request->all());
        
        return redirect()->route("promoter.events.index");
    }

    public function code()
    {
        $events = Event::all();
        $promoters = User::where("role_id",2)->get();
        $tarifs = Tarif::all();
        $users = User::all();
        $reservations = Reservation::all();
        return view('pages.dashboard.promoter.qrcode', ['events'=>$events,'reservations'=>$reservations, 'users'=>$users, 'promoters'=>$promoters, 'tarifs'=>$tarifs]);
    }
    public function generatePdf()
    {

        $pdf = PDF::loadView('pages.dashboard.promoter.qrcode');
        return $pdf->download('pages.dashboard.promoter.qrcode.pdf');
    }
}
