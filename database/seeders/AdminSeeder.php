<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'is_admin'=>1,
            'password'=>bcrypt('admin@123')
        ]);

        User::updateOrCreate([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'is_admin'=>2,
            'password'=>bcrypt('user@123')
        ]);
    }
}
