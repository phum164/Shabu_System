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
            'name' => 'พนักงานครัว',
            'salary' => 20000
        ]);
        Position::create([
            'name' => 'พนักงานต้อนรับ',
            'salary' => 20000
        ]);
        Position::create([
            'name' => 'พนักงานจัดการสต๊อก',
            'salary' => 25000
        ]);
    }
}
