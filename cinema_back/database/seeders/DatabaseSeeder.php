<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DocumentSeeder::class,
            FilmFormatSeeder::class,
            FilmRentSeeder::class,
            FilmSeeder::class,
            MakePercentSeeder::class,
            GenreSeeder::class,
            SeanceStatusSeeder::class,
            UserRolesSeeder::class,
            HallInDocumentseeder::class,
            ChatRoomSeeder::class,
            SeanceSeeder::class
        ]);
    }
}
