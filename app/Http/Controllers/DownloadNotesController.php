<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadNotesController extends Controller
{
    public function downloadNote (Request $request, $id)
    {
        return $this->download($id);
    }
}
