<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seances')->insert([
            [
                'id' => 1,
                'status_id' => 1,
                'user_id' => 1,
                'hall_id' => 1,
                'film_id' => 1,
                'is_repeat' => 1,
                'day' => '2021-12-25',
                'start' => '09:00',
                'duration_advertising' => 60,
                'duration_service' => 5,
                'tickets_amt' => null,
                'tickets_price' => '1500',
                'created_at' => '2021-12-22 21:10:22',
                'updated_at' => '2021-12-22 21:10:22',
            ]
        ]);
    }
}
