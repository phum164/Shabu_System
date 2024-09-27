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
        Menutype::create(['name' => 'เนื้อวัว']);
        Menutype::create(['name' => 'เนื้อหมู']);
        Menutype::create(['name' => 'ทะเล']);
        Menutype::create(['name' => 'ผัก']);
        Menutype::create(['name' => 'ของทานเล่น']);
        Menutype::create(['name' => 'รายการอื่นๆ']);
    }
}
