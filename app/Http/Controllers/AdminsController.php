<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Event;
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
        return view("pages.dashboard.admin.manage-events",["events"=>$events]);
    }

    public function eventsShow(Event $event){

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
