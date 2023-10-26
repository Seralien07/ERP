<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class InitDepartment extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            ['name' => "AM",
            'created_at' => now()],
            ['name' => "Compliance",
            'created_at' => now()],
            ['name' => "CR",
            'created_at' => now()],
            ['name' => "Direction",
            'created_at' => now()],
            ['name' => "CSR",
            'created_at' => now()],
             ['name' => "Ehoala Port",
            'created_at' => now()],
            ['name' => "Finance",
            'created_at' => now()],
            ['name' => "Health",
            'created_at' => now()],
            ['name' => "HR",
            'created_at' => now()],
            ['name' => "HSES",
            'created_at' => now()],
            ['name' => "IST",
            'created_at' => now()],
            ['name' => "Legal Service",
            'created_at' => now()],
            ['name' => "Metallurgy",
            'created_at' => now()],
            ['name' => "Mine",
            'created_at' => now()],
            ['name' => "Mine Planning",
            'created_at' => now()],
             ['name' => "Mine Proccess Service",
            'created_at' => now()],
            ['name' => "MSP",
            'created_at' => now()],
            ['name' => "MSP Admin",
            'created_at' => now()],
            ['name' => "Mtce-Electical Labour Toll",
            'created_at' => now()],
            ['name' => "Mtce-Mine Labour Toll",
            'created_at' => now()],
            ['name' => "Mtce-MSP Labour Toll",
            'created_at' => now()],
            ['name' => "Mtce-Port Labour Toll",
            'created_at' => now()],
            ['name' => "MIP",
            'created_at' => now()],
            ['name' => "PCS",
            'created_at' => now()],
             ['name' => "RTIT",
            'created_at' => now()],
            ['name' => "RIP",
            'created_at' => now()],
            ['name' => "Taxe Team-Madagascar",
            'created_at' => now()],
            ['name' => "Technologie",
            'created_at' => now()],
            ['name' => "Autre",
            'created_at' => now()],
        ]);
    }
}
