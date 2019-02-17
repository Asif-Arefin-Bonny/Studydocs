<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Comment;
use App\NoteRequest;
use App\NoteRequestComment;

class CommentsController extends Controller
{
    public function noteComment (Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required|max:10'
        ]);

        $note = Note::find($id);

        if ($note == null) {
            flash('Note not found')->error();

            return back();
        }

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->note_id = $id;
        $comment->save();

        flash('Comment made')->success();

        return back();
    }

    public function requestComment (Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required|max:10'
        ]);

        $note = NoteRequest::find($id);

        if ($note == null) {
            flash('Note not found')->error();

            return back();
        }

        $comment = new NoteRequestComment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->note_id = $id;
        $comment->save();

        flash('Comment made')->success();

        return back();
    }
}
