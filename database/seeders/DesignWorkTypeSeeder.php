<?php

namespace Database\Seeders;

use App\Models\DesignWork;
use App\Models\DesignWorkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignWorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesignWorkType::create(['name' => 'Posters']);
        DesignWorkType::create(['name' => 'UIUX']);
        DesignWorkType::create(['name' => 'Art']);
    }
}
