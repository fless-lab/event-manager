<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'event_id',
    ];


    public function event(){
        return $this->belongsTo(Event::class);
      }
}
