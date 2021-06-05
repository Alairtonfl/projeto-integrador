<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTournament extends Model
{
    use HasFactory;

    protected $table = 'team_tournament';

    protected $fillable = [
      'team_id',
      'tournament_id',
      'active',
      'phase'
  ];

  public function team(){
    return $this->hasOne(Team::class, 'id', 'team_id');
  }
}