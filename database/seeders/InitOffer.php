<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
class InitOffer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::insert([
            ['name' => "Flotte Corporate",
            'created_at' => now()
            ],
            ['name' => "Corporate 3H-25SMS",
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
