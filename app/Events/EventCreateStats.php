<?php

namespace App\Events;

use App\Models\Stats;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventCreateStats
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  public $stats;
  public $tournament_id;
  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Stats $stats, $tournament_id)
  {
    //
    $this->stats = $stats;
    $this->tournament_id = $tournament_id;
  }
}
