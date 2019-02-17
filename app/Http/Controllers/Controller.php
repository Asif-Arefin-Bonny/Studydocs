<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Note;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Upload, Download and Update function of notes

    public function upload ($request)
    {
        $filenameWithExt = $request->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->storeAs('/public/uploads', $fileNameToStore);

        return '/storage/uploads/'.$fileNameToStore;
    }

    public function download ($id)
    {
        $note = Note::find($id);
        $path = exec('cd ../storage/app/public/ && pwd');
        $file = $path.str_replace("storage/","",$note->note);
        $name = basename($file);
        return response()->download($file, $name);
    }

    public function updateNote ($request, $previous)
    {
        $path = exec('cd ../storage/app/public/  && pwd');
        $file_path = $path.str_replace("storage/","",$previous);
        
        try {
            unlink($file_path);
        } catch (\Exception $e) {
            // do nothing
        }

        $filenameWithExt = $request->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->storeAs('/uploads', $fileNameToStore);

        return '/storage/uploads/'.$fileNameToStore;
    }
}
