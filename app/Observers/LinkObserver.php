<?php

namespace App\Observers;

use App\Models\Link;
use Illuminate\Support\Facades\Redirect;


class LinkObserver
{
    /**
     * Handle the Link "created" event.
     */
    public function created(Link $link): void
    {

        // Generer det ønskede link baseret på det auto-genererede ID
        $link->link = url('/uploads/' . $link->id);
        $link->save();
     
    }

    /**
     * Handle the Link "updated" event.
     */
    public function updated(Link $link): void
    {

    }


    /**
     * Handle the Link "deleted" event.
     */
    public function deleted(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "restored" event.
     */
    public function restored(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "force deleted" event.
     */
    public function forceDeleted(Link $link): void
    {
        //
    }
}
