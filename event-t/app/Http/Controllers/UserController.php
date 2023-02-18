<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\TypeModelRequest;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\TypeModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\flush;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function handleRegistration(User $user,CreateUserRequest $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->promo = $request->promo;
        $user->save();

        return redirect()->route('login')->with('success', 'Votre compte a été crée. Connectez-vous !');
    }
    public function login()
    {
        return view('login');
    }
    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }else{

            return redirect()->back()->with('error', 'Information de connexion non reconnu !');
        }
    }
    public function logout()
    {
        Session :: flush();
        Auth::logout();
        return redirect('home');
    }
    public function page4()
    {
        $events = Event::all();
        return view('page4', compact('events'))->with('i', (request()->input('page',1)-1)*5);
    }
    public function handleTicket(Ticket $ticket,TicketRequest $request)
    {
        $ticket->nbre = $request->nbre;
        $ticket->prix = $request->prix;
        $ticket->event_id = $request->event_id;
        $ticket->save();

        return redirect()->route('page4')->with('error', 'Votre compte a été crée. Connectez-vous !');
    }
    public function page2()
    {
        return view('page2');
    }
    public function handleStore(Request $request)
    {
        $request->validate([
            'titre'=> 'required'
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $destionationPath = 'images/';
            $profileImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destionationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Event::create($input);

        return redirect()->route('page2')->with('error', 'Enregistrement effectuée');
    }
    public function page3()
    {
        $events = Event::all();
        return view('page3', compact('events'))->with('i', (request()->input('page',1)-1)*5);
    }
    public function page5()
    {
        $tickets = Ticket::all();
        return view('page5', compact('tickets'))->with('i', (request()->input('page',1)-1)*5);
    }
    public function handleTTicket(TypeModel $typemodel,TypeModelRequest $request)
    {
        $typemodel->libelle = $request->libelle;
        $typemodel->ticket_id = $request->ticket_id;
        $typemodel->save();

        return redirect()->route('page5')->with('error', 'Votre compte a été crée. Connectez-vous !');
    }
    public function details()
    {
        $events = Event::all();
        return view('details', compact('events'))->with('i', (request()->input('page',1)-1)*5);
    }
}
