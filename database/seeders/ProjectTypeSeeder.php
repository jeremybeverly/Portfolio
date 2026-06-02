<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectType; // Import the ProjectType model

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectType::create(['name' => 'Web Development']);
        ProjectType::create(['name' => 'Mobile App Development']);
        ProjectType::create(['name' => 'UI/UX Design']);
        ProjectType::create(['name' => 'Game Development']);
        ProjectType::create(['name' => 'Data Science']);
    }
}
