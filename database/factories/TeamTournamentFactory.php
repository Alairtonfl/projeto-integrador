<?php

namespace Database\Factories;

use App\Models\TeamTournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamTournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamTournament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $team = \App\Models\Team::count();
        return [
            'active' => true,
            'team_id' => rand(1,$team),
            'tournament_id' => 1
        ];
    }
}
