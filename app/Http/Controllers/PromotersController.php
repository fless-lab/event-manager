<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotersController extends Controller
{
    public function index(){
        return view("pages.dashboard.promoter.index");
    }
}
