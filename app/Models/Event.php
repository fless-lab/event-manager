<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'promoter', 'place', 'category', 'cover'
   ];

   protected $date = [
       'start_date', 'end_date'
   ];
}
