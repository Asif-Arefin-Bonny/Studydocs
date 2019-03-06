<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function comments ()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }

    public function category ()
    {
        return $this->belongsTo('App\Category');
    }
}
