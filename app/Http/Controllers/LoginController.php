<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function accueil(){
        return view('accueil');
    }

    public function index(){
        return view('login');
    }
    public function sign(){
        return view('sign');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

    }

    
}
