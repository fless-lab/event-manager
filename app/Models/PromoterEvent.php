<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventCategory;
use App\Models\EventEvaluate;

class PromoterEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'place',
        'category_id',
        'evaluate_id',
        'cover',  /* Image path */
        'start_date',
        'end_date',
   ];

   public function evaluate(){
    return $this->belongsTo(EventEvaluate::class);
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
