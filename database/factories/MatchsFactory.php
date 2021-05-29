<?php

namespace Database\Factories;

use App\Models\Matchs;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matchs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $stats = \App\Models\Stats::count();
      //$tournament = \App\Models\Tournament::count();
        return [
            'location' => $this->faker->city(),
            'stats_id' => rand(1, $stats),
            'date' => now(),
            'created_at' => now()
        ];
    }
}
