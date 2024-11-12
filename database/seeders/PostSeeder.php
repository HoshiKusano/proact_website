<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ja_JP'); // 日本語のFakerを作成
        
        // 20個のダミーデータを作成する例
        for ($i = 0; $i < 20; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->realText(20), // 20文字程度の日本語テキスト
                'body' => $faker->realText(200),  // 200文字程度の日本語テキスト
                'image_url' => 'images/test' . $faker->numberBetween(1, 5) . '.png', // ランダムな画像パス
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
