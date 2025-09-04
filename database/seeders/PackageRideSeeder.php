<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageRideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allInId = DB::table('packages')->where('code', 'ALL-1200')->value('id');
        $rides   = DB::table('rides')->get();

        // Link All-in Package to all rides
        foreach ($rides as $ride) {
            DB::table('package_rides')->insert([
                'package_id' => $allInId,
                'ride_id'    => $ride->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Link each individual package to its matching ride
        foreach ($rides as $ride) {
            $package = DB::table('packages')->where('name', $ride->name)->first();
            if ($package) {
                DB::table('package_rides')->insert([
                    'package_id' => $package->id,
                    'ride_id'    => $ride->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
