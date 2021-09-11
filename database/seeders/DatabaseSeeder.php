<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Tournament::factory(5)->create();
        \App\Models\Team::factory(16)->create();
        \App\Models\TeamTournament::factory(16)->create();
        \App\Models\Player::factory(23)->create();
        //\App\Models\Stats::factory(10)->create();
        //\App\Models\Matchs::factory(16)->create();
        
    }
}
