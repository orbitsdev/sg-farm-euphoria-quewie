<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rides')->insert([
            ['name' => 'General Entry',    'description' => 'Entrance to the park', 'is_active' => true],
            ['name' => 'Grass Luge',       'description' => 'Downhill ride with wheels', 'is_active' => true],
            ['name' => 'Go Kart',          'description' => 'Outdoor karting circuit', 'is_active' => true],
            ['name' => 'Rainbow Slide',    'description' => 'Colorful giant slide', 'is_active' => true],
            ['name' => 'Glass Bridge',     'description' => 'See-through hanging bridge', 'is_active' => true],
            ['name' => 'Sky Cycle',        'description' => 'Biking above ground', 'is_active' => true],
            ['name' => 'Log Jump',         'description' => 'Balance jump challenge', 'is_active' => true],
            ['name' => 'Giant Swing',      'description' => 'High swing thrill ride', 'is_active' => true],
            ['name' => 'Celebrity Ladder', 'description' => 'Free ladder climbing attraction', 'is_active' => true],
        ]);
    }
}
