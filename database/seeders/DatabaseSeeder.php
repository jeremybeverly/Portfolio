<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Sigma',
            'email' => 'admin@example.com', // Your email
            'password' => bcrypt('password'), // Your password
        ]);

        $this->call(ProjectTypeSeeder::class);
        $this->call(DesignWorkTypeSeeder::class);
    }
}
