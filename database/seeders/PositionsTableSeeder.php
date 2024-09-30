<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'name' => 'admin',
            'sarary' => 100000
        ]);
        Position::create([
            'name' => 'manager',
            'sarary' => 50000
        ]);
        Position::create([
            'name' => 'kitchen',
            'sarary' => 15000
        ]);
        Position::create([
            'name' => 'cashier',
            'sarary' => 17000
        ]);
        Position::create([
            'name' => 'stock controller',
            'sarary' => 13000
        ]);
    }
}
