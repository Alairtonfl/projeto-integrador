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
        $shots1 = rand(1,18);
        $shots2 = rand(1,18);
        $possesion = rand(1,100);
        return [
            'shots1' => $shots1,
            'shots2' => $shots2,
            'possesion1' => $possesion,
            'possesion2' => (100-$possesion),
            'goals1' => rand(0,($shots1/2)),
            'goals2' => rand(0,($shots2/2)),
            'created_at' => now()
        ];
    }
}
