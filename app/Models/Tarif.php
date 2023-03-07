<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'num',
        'event_id',
        'start_date',
        'end_date',
   ];

}
