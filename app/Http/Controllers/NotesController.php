<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    public function showAll ()
    {
        $notes = Note::orderBy('created_at', 'DESC')->paginate(30);

        return view('notes.show-all', compact('notes'));
    }

    public function show (Request $request, $id)
    {
        $note = Note::find($id);

        return view('notes.show', compact('note'));
    }
}
