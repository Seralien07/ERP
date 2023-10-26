<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compagny;

class InitCompagny extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compagny::insert([
            ['name' => "QMM",
            'created_at' => now()
            ],
            ['name' => "Contractant",
            'created_at' => now()
            ],
            ['name' => "Autre",
            'created_at' => now()
            ],
        ]);
    }
}
