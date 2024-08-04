<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  create 45 user as staff and 5 users as admin don't use factory
        for ($i = 1; $i <= 45; $i++) {
            User::create([
                'name' => 'Staff User ' . $i,
                'email' => 'staff' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'staff',
                'status' => '1',
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'Admin User ' . $i,
                'email' => 'admin' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
                'status' => '1',
            ]);
        }
    }
}
