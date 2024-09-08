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
        Position::create(['name' => 'admin']);
        Position::create(['name' => 'manager']);
        Position::create(['name' => 'kitchen']);
        Position::create(['name' => 'cashier']);
        Position::create(['name' => 'stock controller']);
    }
}
