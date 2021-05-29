<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournament';

    protected $fillable = [
      'name',
      'number_teams',
      'description',
      'prize',
      'sport',
      'user_id'
  ];

  public function teams(){
    return $this->belongsToMany(\App\Models\Team::class, 'team_tournament', 'tournament_id', 'team_id');
  }
}
