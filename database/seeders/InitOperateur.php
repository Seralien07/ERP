<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operateur;

class InitOperateur extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operateur::insert([
            ['name' => "Telma",
            'created_at' => now()
            ],
            ['name' => "Orange",
            'created_at' => now()
            ],
            ['name' => "Autre",
            'created_at' => now()
            ],
        ]);  
    }
}
