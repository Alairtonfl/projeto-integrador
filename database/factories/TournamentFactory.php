<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = \App\Models\User::count();
        return [
            'name' => $this->faker->name(),
            'number_teams' => 16,
            'description' => $this->faker->text(),
            'prize' => $this->faker->randomNumber(5),
            'sport' => $this->faker->name(),
            'user_id' => rand(1,$user),
            'created_at' => now(),
        ];
    }
}
