<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('register');
    }

    public function home()
    {
        return view('home');
    }
    public function event()
    {
        return view('event');
    }
    public function dashboard()
    {
        return view('layouts.dashboard');
    }
    public function page1()
    {
        return view('page1');
    }
    public function page2()
    {
        return view('page2');
    }
    
    public function page4()
    {
        return view('page4');
    }
    
    public function page6()
    {
        return view('page6');
    }
}
