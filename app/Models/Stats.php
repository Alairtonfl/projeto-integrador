<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats';

    protected $fillable = [
      'shots1',
      'shots2',
      'team1_id',
      'team2_id',
      'possesion1',
      'possesion2',
      'goals1',
      'goals2'

  ];
}
