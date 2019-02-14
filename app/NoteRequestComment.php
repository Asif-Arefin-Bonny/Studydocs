<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteRequestComment extends Model
{
    public function noteRequest ()
    {
        return $this->belongsTo('App\NoteRequest');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
