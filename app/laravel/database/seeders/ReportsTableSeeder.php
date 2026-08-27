<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reports')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'report_reason' => 'テスト用の違反報告です。',
            'created_at' => now(),
        ]);
    }
}
