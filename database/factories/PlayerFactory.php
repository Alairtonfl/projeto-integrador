<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $position = random_int(1,4);
      if($position == 1){
        $position =  'GOL';
        } elseif($position == 2){
          $position =  'DEF';
        } elseif($position == 3){
          $position =  'MEI';
        } else{
          $position =  'ATA';
        }
      return [
        'name' => $this->faker->name(),
        'position' => $position,
        'team_id' => 1,
        'created_at' => now(),
  ];
    }
}
