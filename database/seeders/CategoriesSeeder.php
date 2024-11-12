<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create('ja_JP'); // 日本語のFakerを作成
        
        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->realText(10), // 5文字程度の日本語テキスト
                
            ]);
         
        }
    }
    
}
