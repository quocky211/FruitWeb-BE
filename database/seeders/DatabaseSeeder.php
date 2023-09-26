<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Quốc Kỳ',
            'email' => 'quocky@example.com',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Quang Lâm',
            'email' => 'quanglam@example.com',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);
    }
}
