<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // $UserData = [
        //     [
        //         'name' => 'Iman',
        //         'username' => 'xxdakon',
        //         'email' => 'iman@gmail.com',
        //         'role' => 'User',
        //         'password' => bcrypt('123456')
        //     ]
        // ];

        // foreach ($UserData as $key => $val) {
        //     User::create($val);
        // }

        // User::create([
        //     'name' => 'Admin Faker',
        //     'username' => 'admin123',
        //     'role' => 'admin',
        //     'email' => 'admin@faker.com',
        //     'password' => Hash::make('password123'), // Harus di-hash agar bisa login
        // ]);
    }
}
