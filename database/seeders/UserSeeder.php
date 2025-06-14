<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'username' => 'admin',
        ], [
            'full_name' => 'Administrator',
            'password' => Hash::make('password'),
            'dipa_company_id' => 1,
            'is_active' => 1,
        ]);

        $admin->assignRole('admin');
    }
}