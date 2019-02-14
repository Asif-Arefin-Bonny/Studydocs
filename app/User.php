<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function uploads ()
    {
        return $this->hasMany('App\Note');
    }

    public function noteRequests ()
    {
        return $this->hasMany('App\NoteRequest');
    }

    public function noteRequestComment ()
    {
        return $this->hasMany('App\NoteRequestComment');
    }

    public function noteComment ()
    {
        return $this->hasMany('App\Comment');
    }
}
