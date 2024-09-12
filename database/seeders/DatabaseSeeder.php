<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Menutype;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Menutype::create(['name' => 'เนื้อสัตว์']);
        Menutype::create(['name' => 'ผัก']);
        Menutype::create(['name' => 'ทะเล']);
        Menutype::create(['name' => 'เครื่องใน']);
        Menutype::create(['name' => 'ของทานเล่น']);
        Menutype::create(['name' => 'ของหวาน']);
        Menutype::create(['name' => 'รายการอื่นๆ']);
    }
}
