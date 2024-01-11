<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function createLink(Request $request)
    {
        // Opret et nyt link
        $newLink = Link::create(['link' => '']); // Du kan også tilføje en konkret URL her

        // Generer det ønskede link baseret på det auto-genererede ID
        $newLink->link = url('/links/' . $newLink->id);
        $newLink->save();

        // Returner visningen eller redirect efter behov
        // Eksempel:
        return redirect()->route('link.index')->with('success', 'Link oprettet successfully!');
    }
}