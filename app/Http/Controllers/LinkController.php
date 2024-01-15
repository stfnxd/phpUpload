<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function createLink(Request $request)
    {
        $newLink = Link::create(['link' => '']);


        $newLink->link = url('/links/' . $newLink->id);
        $newLink->save();


        return redirect()->route('link.index')->with('success', 'Link oprettet successfully!');
    }
}