<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'tarif_id',
        'user_id',
        'event_id',
    ];


    public function tarif(){
        return $this->belongsTo(Tarif::class);
      }
      public function user(){
        return $this->belongsTo(User::class);
      }
      public function event(){
        return $this->belongsTo(Event::class);
      }
}
