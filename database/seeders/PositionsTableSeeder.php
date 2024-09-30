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
            'salary' => 100000
        ]);
        Position::create([
            'name' => 'manager',
            'salary' => 50000
        ]);
        Position::create([
            'name' => 'kitchen',
            'salary' => 15000
        ]);
        Position::create([
            'name' => 'cashier',
            'salary' => 17000
        ]);
        Position::create([
            'name' => 'stock controller',
            'salary' => 13000
        ]);
    }
}
