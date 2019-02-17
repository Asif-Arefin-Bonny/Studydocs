<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoteRequest;
use App\Category;

class NotesRequestController extends Controller
{
    // CRUD functions for NoteRequests
    public function showAll ()
    {
        $requests = NoteRequest::orderBy('created_at', 'DESC')->paginate(30);

        return view('note-requests.show-all', compact('requests'));
    }

    public function show (Request $request, $id)
    {
        $req = NoteRequest::find($id);

        if ($req == null) {
            flash('Note Request not found')->error();

            return back();
        }

        return view('note-requests.show', compact('req'));
    }

    public function create ()
    {
        return view('note-requests.create');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $category = Category::where('name', $request->category)->first();

        if ($category == null) {
            $category = new Category;
            $category->name = $request->category;
            $category->save();
        }

        $req = new NoteRequest;
        $req->name = $request->name;
        $req->description = $request->description;
        $req->user_id = auth()->user()->id;
        $req->category_id = $category->id;
        $req->save();
        
        flash('Note Request successfully saved')->success();

        return redirect(route('show-request', ['id' => $req->id]));
    }
}
