<?php

namespace App\Listeners;

use App\Events\EventCreateTeam;
use App\Http\Controllers\PlayerController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePlayerListener
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
     * @param  EventCreateTeam  $event
     * @return void
     */
    public function handle(EventCreateTeam $event)
    {
        $player = new PlayerController();
        $player->create($event->team);
    }
}
