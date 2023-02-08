<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'id' => 1,
                'title' => 'Аниме',
            ],[
                'id' => 2,
                'title' => 'Биографический',
            ],[
                'id' => 3,
                'title' => 'Боевик',
            ],[
                'id' => 4,
                'title' => 'Вестерн',
            ],[
                'id' => 5,
                'title' => 'Военный',
            ],[
                'id' => 6,
                'title' => 'Детектив',
            ],[
                'id' => 7,
                'title' => 'Детский',
            ],[
                'id' => 8,
                'title' => 'Документальный',
            ],[
                'id' => 9,
                'title' => 'Драма',
            ],[
                'id' => 10,
                'title' => 'Исторический',
            ],[
                'id' => 11,
                'title' => 'Кинокомикс',
            ],[
                'id' => 12,
                'title' => 'Комедия',
            ],[
                'id' => 13,
                'title' => 'Концерт',
            ],[
                'id' => 14,
                'title' => 'Короткометражный',
            ],[
                'id' => 15,
                'title' => 'Криминал',
            ],[
                'id' => 16,
                'title' => 'Мелодрама',
            ],[
                'id' => 17,
                'title' => 'Мистика',
            ],[
                'id' => 18,
                'title' => 'Мультфильм',
            ],[
                'id' => 19,
                'title' => 'Мюзикл',
            ],[
                'id' => 20,
                'title' => 'Научный',
            ],[
                'id' => 21,
                'title' => 'Нуар',
            ],[
                'id' => 22,
                'title' => 'Приключения',
            ],[
                'id' => 23,
                'title' => 'Семейный',
            ],[
                'id' => 24,
                'title' => 'Спорт',
            ],[
                'id' => 25,
                'title' => 'Триллер',
            ],[
                'id' => 26,
                'title' => 'ужасы',
            ],[
                'id' => 27,
                'title' => 'фантастика',
            ],[
                'id' => 28,
                'title' => 'фэнтези',
            ],
        ]);
    }
}
