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
  public $team_tournament_id1;
  public $team_tournament_id2;
  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Stats $stats, $team_tournament_id1, $team_tournament_id2)
  {
    //
    $this->stats = $stats;
    $this->team_tournament_id1 = $team_tournament_id1;
    $this->team_tournament_id2 = $team_tournament_id2;
  }
}
