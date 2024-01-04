<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($filename)
    {
        // Where the file is stored
        $filePath = storage_path('app/public/uploads/' . $filename);

        return response()->download($filePath, $filename);
    }
}
