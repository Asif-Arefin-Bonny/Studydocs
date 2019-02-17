<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Category;

class UploadNotesController extends Controller
{
    // Upload notes function calls Controller download function
    public function create ()
    {
        return view('notes.create');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:80',
            'description' => 'required|max:200',
            'type' => 'required',
            'category' => 'required',
        ]);

        if ($request->type == 1) {
            $this->validate($request, [
                'note' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'note_text' => 'required|max:255',
            ]);
        }

        $category = Category::where('name', $request->category)->first();

        if ($category == null) {
            $category = new Category;
            $category->name = $request->category;
            $category->save();
        }

        $note = new Note;
        $note->name = $request->name;
        $note->description = $request->description;
        $note->type = $request->type;
        $note->category_id = $category->id;
        $note->user_id = auth()->user()->id;

        if ($request->type == 1) {
            $note->note = $this->upload($request->note);
        } else {
            $note->note = $request->note_text;
        }

        $note->save();

        flash('Note successfully created')->success();

        return redirect(route('show-note', ['id' => $note->id]));
    }

    public function edit (Request $request, $id)
    {
        $note = Note::find($id);

        if ($note == null) {
            flash('Note not found')->error();

            return back();
        }

        if ($note->user_id != auth()->user()->id) {
            flash('You are not authorized to make this edit')->error();
            
            return back();
        }

        return view('notes.edit', compact('note'));
    }

    public function update (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:80',
            'description' => 'required|max:200',
            'type' => 'required',
            'category' => 'required',
        ]);

        $note = Note::find($request->id);

        if ($note == null) {
            flash('Note not found')->error();

            return back();
        }

        if ($note->user_id != auth()->user()->id) {
            flash('You are not authorized to make this edit')->error();
            
            return back();
        }

        if ($request->type == 1) {
            $this->validate($request, [
                'note' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'note_text' => 'required|max:255',
            ]);
        }

        $category = Category::where('name', $request->category)->first();

        if ($category == null) {
            $category = new Category;
            $category->name = $request->category;
            $category->save();
        }

        $note->name = $request->name;
        $note->description = $request->description;
        $note->type = $request->type;
        $note->category_id = $category->id;
        $note->user_id = auth()->user()->id;

        if ($request->type == 1) {
            $note->note = $this->update($request->note, $note->note);
        } else {
            $note->note = $request->note_text;
        }

        $note->save();

        flash('Note successfully updated')->success();

        return redirect(route('show-note', ['id' => $note->id]));
    }
}
