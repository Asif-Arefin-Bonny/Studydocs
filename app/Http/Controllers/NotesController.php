<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Category;

class NotesController extends Controller
{
    public function showAll ()
    {
        $notes = Note::orderBy('created_at', 'DESC')->paginate(30);

        return view('notes.show-all', compact('notes'));
    }

    public function showByCategory (Request $request)
    {
        $categories = Category::all();
        if(isset($request->category)){
            $category = Category::find($request->category);
        }else{
            $category = Category::find(1);
        }   
        
        $notes = $category->notes()->paginate(30);

        return view('home', compact('notes', 'categories'));
    }

    public function show (Request $request, $id)
    {
        $note = Note::find($id);

        return view('notes.show', compact('note'));
    }
}
