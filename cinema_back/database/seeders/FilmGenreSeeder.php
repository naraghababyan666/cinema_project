<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            [
                'id' => 1,
                'film_id' => 1,
                'genre_id' => 1,
                'created_at' => '2021-10-08 13:20:38',
                'updated_at' => '2021-10-08 13:20:38',
            ]
            ]);
    }
}
