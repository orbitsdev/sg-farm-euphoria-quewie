<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@quewie.test'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        // Teller user
        $teller = User::firstOrCreate(
            ['email' => 'cashier@quewie.test'],
            [
                'name' => 'Cashier',
                'password' => Hash::make('password'),
            ]
        );
        $teller->assignRole('cashier');
    }
}
