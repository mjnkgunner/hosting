<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Inani\Larapoll\Traits\Voter;


class User extends Authenticatable
{
    use Notifiable, Voter;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "users";
    
    public function position(){
        return $this->belongsTo('App\Position','id_position','id');
    }
    public function customer(){
        return $this->hasMany('App\Customer','id_user','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','id_user','id');
    }
    public function staff(){
        return $this->hasOne('App\Staff','id_user','id');
    }
    public function sessioncart(){
        return $this->hasMany('App\SessionCart','id_user','id');
    }
}

