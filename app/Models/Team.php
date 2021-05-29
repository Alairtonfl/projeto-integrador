<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
      'name',
      'emblem',
      'abreviation',
      'user_id'
  ];

    public function tournaments(){
      return $this->belongsToMany(\App\Models\Tournament::class, 'team_tournament', 'team_id', 'tournament_id');
    }
}
