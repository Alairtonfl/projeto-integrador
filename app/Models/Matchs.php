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
      'tournament_id',
  ];
}
