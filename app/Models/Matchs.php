<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
  use HasFactory;

  protected $table = 'matchs';

  protected $fillable = [
    'date',
    'location',
    'stats_id',
    'team_tournament_id1',
    'team_tournament_id2',
  ];

  public function stats()
  {
    return $this->hasOne(Stats::class,'id','stats_id');
  }

  public function team_tournament1(){
    return $this->hasOne(TeamTournament::class, 'id', 'team_tournament_id1');
  }

  public function team_tournament2(){
    return $this->hasOne(TeamTournament::class, 'id', 'team_tournament_id2');
  }
}
