<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            'name'=>'KusanoHoshi',
            'email'=>'bb48122030@ms.nagasaki-u.ac.jp',
            'grade'=> '3年生',
            'password'=> Hash::make('Hosi1025'),
            ]);
    }
}
