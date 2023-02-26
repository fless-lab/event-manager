<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index(){
        $total_users = count(User::all());
        $total_events = count(Event::all());
        $total_categories = count(EventCategory::all()  );
        return view("pages.dashboard.admin.index",["users"=>$total_users,"events"=>$total_events,"categories"=>$total_categories]);
    }


    // User management functions
    public function usersIndex(){
        $users = User::all();
        return view("pages.dashboard.admin.manage-users",["users"=>$users]);
    }

    public function usersStore(Request $request){

        $promoter = array_key_exists('promoter', $request->input());
        $role = Role::where("name",$promoter?"Promoter":"User")->first();

        User::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "phone" => $request->phone,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "role_id" => $role->id
        ]);

        // Send an email with username and password to user

        return redirect()->back()->with('success', "Utilisateur créé avec succès.");
    }

    public function usersUpdate(Request $request,User $user){
        $userActiveRoleId = $user->role_id;
        $promoter = array_key_exists('promoter', $request->input());
        $newRole = Role::where("name",$promoter?"Promoter":"User")->first();

        $user->update([
            "firstname" => $request->firstname ?? $user->firstname,
            "lastname" => $request->lastname ?? $user->lastname,
            "email" => $request->email ?? $user->email,
            "phone" => $request->phone ?? $user->phone,
            "username" => $request->username ?? $user->username,
            "password" => $request->password ? Hash::make($request->password) : $user->username
        ]);

        if($userActiveRoleId != $newRole->id){
            $user->update(["role_id"=>$newRole->id]);
        }

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

    public function usersDelete(User $user){

        $user->delete();
        return redirect()->back()->with('success', "Utilisateur supprimée avec succès.");
    }



    // Event management functions
    public function eventsIndex(){
        $events = Event::all();
        $promoters = User::where("role_id",2)->get();
        $categories = EventCategory::all();
        return view("pages.dashboard.admin.manage-events",["events"=>$events,"promoters"=>$promoters,'categories'=>$categories]);
    }

    public function eventsShow(Event $event){

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
            "category_id"=>$request->category_id,
            "promoter_id"=>$request->promoter_id,
            "status"=>$request->status,
            "title"=>$request->title,
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
            "category_id"=>$request->category_id??$event->category_id,
            "promoter_id"=>$request->promoter_id??$event->promoter_id,
            "status"=>$request->status??$event->status,
            "title"=>$request->title??$event->title,
            "start_date"=>$start_timestamp,
            "end_date"=>$end_timestamp,
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

    public function eventsEvaluate(Request $request,Event $event){
        $event->update([
            "status"=>$request->status
        ]);

        return back()->with("success","Votre évalution a été prise en compte !");
    }


    // Event categories management functions
    public function eventCategoriesIndex(){
        $categories = EventCategory::all();
        return view("pages.dashboard.admin.manage-events-categories",["categories"=>$categories]);
    }

    public function eventCategoriesStore(Request $request){
        EventCategory::create([
            "name"=>$request->name,
            "description"=>$request->description,
        ]);
        return redirect()->back()->with("success","Nouvelle catégorie d'évenement ajouté avec succès !");
    }

    public function eventCategoriesUpdate(Request $request,EventCategory $category){
        $category->update([
            "name"=>$request->name??$category->name,
            "description"=>$request->description??$category->description
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

    public function eventCategoriesDelete(EventCategory $category){
        $category->delete();
        return redirect()->back()->with('success', "Catégorie d'évenement supprimée avec succès.");
    }
}
