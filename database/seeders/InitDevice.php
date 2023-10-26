<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;

class InitDevice extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Device::insert([
            ['name' => "Domino",
            'created_at' => now()
            ],
            ['name' => "Flybox",
            'created_at' => now()
            ],
            ['name' => "Ip Phone",
            'created_at' => now()
            ],
            ['name' => "iPhone",
            'created_at' => now()
            ],
            ['name' => "Modem",
            'created_at' => now()
            ],
            ['name' => "Mobile Phone",
            'created_at' => now()
            ],
            ['name' => "Smart Phone",
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
