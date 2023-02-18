<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class TestControlller extends Controller
{
    public function page2()
    {
        return view('page2');
    }
    public function done(Request $request)
    {
        $request->validate([
            'titre'=> 'required'
        ]);

        $input = $request->all();
        if($image->$request->file('image')){
            $destionationPath = 'images/';
            $profileImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destionationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Event::create($input);

        return redirect()->route('create')->with('succes', 'Enregistrement effectuée');
    }
}
