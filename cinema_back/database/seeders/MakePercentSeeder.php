<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakePercentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('make_percents')->insert([
            [
                'id' => 1,
                'percent' => 50,
                'created_at' => "2022-02-17 13:20:38",
                'updated_at' => "2022-02-17 13:20:38",
            ]
        ]);
    }
}
