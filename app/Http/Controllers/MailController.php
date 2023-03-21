<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
	public function index(){
        // Envoi du mail aux utilisateurs
        $data = ['name'=>'visiteur', 'data'=>'hello visitor'];
        $user['to'] = 'kombate@gmail.com';

		Mail::send('email', $data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('utilisateur créer');
        });
        
	}

}
