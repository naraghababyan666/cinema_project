<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film_formats')->insert([
            [
            'id' => 1,
            'title' => '2D',
            ],[
            'id' => 2,
            'title' => '3D',
            ],
        ]);
    }
}
