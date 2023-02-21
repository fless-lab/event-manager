<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', //will be generated automaticaly on front-end
        'email',
        'password',
        'firstname',
        'lastname',
        'phone',
        'role_id',
        "validated"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(){
        return $this->role->name=="Admin";
    }
    public function isPromoter(){
        return $this->role->name=="Promoter";
    }
    public function isSimpleUser(){
        return $this->role->name=="User";
    }
}
