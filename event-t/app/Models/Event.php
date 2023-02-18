<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
         'titre', 'description', 'organisateur', 'lieu', 'type', 'image'
    ];

    protected $date = [
        'date_deb', 'date_fin'
    ];
}
