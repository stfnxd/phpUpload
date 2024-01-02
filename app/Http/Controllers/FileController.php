<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showForm()
    {
        return view('file.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        // Lagre filstien eller anden information i databasen, hvis nødvendigt

        return redirect()->route('file.form')->with('success', 'Filen blev uploadet.');
    }
}
