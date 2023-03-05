<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'type_id',
    ];


    public function type(){
        return $this->belongsTo(TypeTicket::class);
      }
}
