<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmRentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film_rent')->insert([
            [
                'id' => 1,
                'rent' => 0,
                'rent_title' => 'Не в прокате',
            ],[
                'id' => 2,
                'rent' => 1,
                'rent_title' => 'В прокате',
            ],
        ]);
    }
}
