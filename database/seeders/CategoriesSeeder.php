<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    
     public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => '1年生',
            ],
            [
                'name' => '2年生',
            ],
            [
                'name' => '3年生',
            ],
            [
                'name' => '4年生',
            ],
        ]);
    }
    
}
