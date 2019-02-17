<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteRequest extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function comments ()
    {
        return $this->hasMany('App\NoteRequestComment', 'note_id');
    }
}