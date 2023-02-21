<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'place',
        'category_id',
        'cover',  /* Image path */
        'status', /* Pending, Validated, Rejected */
        'promoter_id',
        'start_date',
        'end_date',
   ];

   public function promoter(){
     return $this->belongsTo(User::class);
   }

   public function category(){
     return $this->belongsTo(EventCategory::class);
   }

   public function getCoverAttribute($value){
    if($value){
        return asset("images/uploads/events/covers/".$value);
    }else{
        return asset("images/uploads/events/covers/default-event-cover.png");
    }
   }
}
