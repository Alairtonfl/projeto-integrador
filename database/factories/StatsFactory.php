<?php

namespace Database\Factories;

use App\Models\Stats;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stats::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'shots1' => 0,
            'shots2' => 0,
            'possesion1' => 0,
            'possesion2' => 0,
            'goals1' => 0,
            'goals2' => 0,
            'created_at' => now()
        ];
    }
}
