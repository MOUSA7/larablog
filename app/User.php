<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','resume',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function blog(){
        return $this->hasMany(Blog::class);
    }
    public function category(){
        return $this->hasMany('App\Category');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }

}
