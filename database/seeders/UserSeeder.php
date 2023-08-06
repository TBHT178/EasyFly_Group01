<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'tramtran',
            'email' => 'tramtran@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'khaibui',
            'email' => 'khaibui@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'phatngo',
            'email' => 'phatngo@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
