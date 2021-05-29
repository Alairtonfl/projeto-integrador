<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

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
              'abreviation' => 'COR',
              'emblem' => 'https://iconape.com/wp-content/png_logo_vector/corinthians-preto-e-dourado-logo.png',
              'user_id' => 1,
              'created_at' => now(),
        ];
    }
}
