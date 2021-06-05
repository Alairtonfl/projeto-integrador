<?php

namespace App\Listeners;

use App\Events\EventCreateStats;
use App\Http\Controllers\MatchsController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateMatchListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventCreateStats  $event
     * @return void
     */
    public function handle(EventCreateStats $event)
    {
        //
        $match = New MatchsController;
        $match->create($event->stats, $event->team_tournament_id1, $event->team_tournament_id2);
    }
}
