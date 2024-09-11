<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create(['name' => 'Bom Phumrapee', 'email' => 'bomph@gmail.com', 'position_id' => 1,'password' => bcrypt('12345678')]);
        User::create(['name' => 'Ptong Sutinun', 'email' => 'tongsu@gmail.com', 'position_id' => 1,'password' => bcrypt('12345678')]);
        User::create(['name' => 'Jane Doe', 'email' => 'janedoe@example.com', 'position_id' => 2,'password' => bcrypt('12345678')]);

    }
}