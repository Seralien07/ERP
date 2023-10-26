<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voice;

class InitVoice extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voice::insert([
            ['name' => "LC (Limite de Credit)",
            'created_at' => now()
            ],
            ['name' => "N-A",
            'created_at' => now()
            ],
            ['name' => "Autre",
            'created_at' => now()
            ],
        ]);
    }
}
