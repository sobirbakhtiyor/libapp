<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active','',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
        
    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }
    public function ebook(){

        return $this->belongsTo('App\Ebook');

    }

    public function isAdmin(){

        if($this->role->id == 3){

            return false;

        }

        return true;

    }

    public function posts(){

        return $this->hasMany('App\Post');
        
    }

    public function books(){

        return $this->hasMany('App\Book');

    }

}
