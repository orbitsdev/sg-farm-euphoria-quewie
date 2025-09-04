<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            ['name' => 'All in Package',  'code' => 'ALL-1200', 'price' => 1200.00, 'description' => 'Includes all rides 1–9', 'is_active' => true],

            // Individual ride packages
            ['name' => 'General Entry',    'code' => 'ENT-150',   'price' => 150.00, 'description' => 'Entrance only', 'is_active' => true],
            ['name' => 'Grass Luge',       'code' => 'LUGE-150',  'price' => 150.00, 'description' => '1 ride Grass Luge', 'is_active' => true],
            ['name' => 'Go Kart',          'code' => 'KART-150',  'price' => 150.00, 'description' => '1 ride Go Kart', 'is_active' => true],
            ['name' => 'Rainbow Slide',    'code' => 'SLIDE-150', 'price' => 150.00, 'description' => '1 ride Rainbow Slide', 'is_active' => true],
            ['name' => 'Glass Bridge',     'code' => 'GLASS-250', 'price' => 250.00, 'description' => 'Glass Bridge entry', 'is_active' => true],
            ['name' => 'Sky Cycle',        'code' => 'SKY-250',   'price' => 250.00, 'description' => 'Sky Cycle ride', 'is_active' => true],
            ['name' => 'Log Jump',         'code' => 'LOG-250',   'price' => 250.00, 'description' => 'Log Jump activity', 'is_active' => true],
            ['name' => 'Giant Swing',      'code' => 'SWING-200', 'price' => 200.00, 'description' => 'Giant Swing ride', 'is_active' => true],
            ['name' => 'Celebrity Ladder', 'code' => 'LADDER-0',  'price' => 0.00,   'description' => 'Free ladder climbing', 'is_active' => true],
        ]);
    }
}
