<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Dimas',
            'email' => 'dimas24@gmail.com',
            'password' => Hash::make('1234'), // Ganti dengan password yang diinginkan
        ]);

        User::create([
            'name' => 'Dimas 2',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('12345'), // Ganti dengan password yang diinginkan
        ]);
    }
}
