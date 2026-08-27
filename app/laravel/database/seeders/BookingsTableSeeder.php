<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bookings')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'name' => 'テスト予約者',
            'tel' => '09012345678',
            'checkin_date' => '2026-09-01',
            'checkout_date' => '2026-09-02',
            'booking_people' => 2,
            'del_flg' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}