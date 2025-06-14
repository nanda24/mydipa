<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dipa_companies')->insert([
            'name' => 'Dipa Group',
            'code' => 'DIPA',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Dipa Pharmalab Intersains',
            'code' => 'DPI',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Dipa Pharmalab Intersains - Majalengka',
            'code' => 'DPI2',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Dipa Puspa Labsains',
            'code' => 'DPL',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Multiredjeki Kita',
            'code' => 'MRK',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Dipa Manufacturing Group',
            'code' => 'DMG',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dipa_companies')->insert([
            'name' => 'PT. Dipa Global Medtek',
            'code' => 'DGM',
            'is_active' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}