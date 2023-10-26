<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class InitCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => "Equitement Reseaux",
            'created_at' => now()
            ],
            ['name' => "Laptop",
            'created_at' => now()
            ],
            ['name' => "Desktop",
            'created_at' => now()
            ],
            ['name' => "Accessoirs Machine",
            'created_at' => now()
            ],
            ['name' => "Imprimante",
            'created_at' => now()
            ],
            ['name' => "Consommable",
            'created_at' => now()
            ],
            ['name' => "Telephone",
            'created_at' => now()
            ],
            ['name' => "Accessoirs Telephone",
            'created_at' => now()
            ], 
            ['name' => "Autre",
            'created_at' => now()
            ],
        ]); 
    }
}
