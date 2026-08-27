<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'テスト旅館',
            'content' => 'テスト用の旅館です。',
            'address' => '大阪府大阪市',
            'image_path' => null,
            'price' => 10000,
            'max_people' => 4,
            'reserve_date' => '2026-09-01',
            'del_flg' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
