<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Marvel;

class MarvelObserver
{
    /**
     * Handle the Marvel "created" event.
     */
    public function creating(Marvel $marvel): void
    {
        $marvel->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Marvel "updated" event.
     */
    public function updated(Marvel $marvel): void
    {
        //
    }

    /**
     * Handle the Marvel "deleted" event.
     */
    public function deleted(Marvel $marvel): void
    {
        //
    }

    /**
     * Handle the Marvel "restored" event.
     */
    public function restored(Marvel $marvel): void
    {
        //
    }

    /**
     * Handle the Marvel "force deleted" event.
     */
    public function forceDeleted(Marvel $marvel): void
    {
        //
    }
}
