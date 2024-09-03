<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yorman Valencia',
            'email' => 'yormanvale@outlook.com',
            'username' => 'yormanvale@outlook.com',
            'password' => Hash::make(1234), // Asegúrate de cifrar la contraseña
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}

