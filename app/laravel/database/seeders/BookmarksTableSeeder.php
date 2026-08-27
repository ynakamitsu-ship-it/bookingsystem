<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarksTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bookmarks')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
