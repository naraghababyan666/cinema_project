<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'id' => 1,
                'slug' => 'users',
                'title' => 'Клиент',
                'titles' => 'Клиенты',
                'title_r' => 'Клиента',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 2,
                'slug' => 'cashiers',
                'title' => 'Кассир',
                'titles' => 'Кассиры',
                'title_r' => 'Кассира',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 3,
                'slug' => 'operators',
                'title' => 'Оператор',
                'titles' => 'Операторы',
                'title_r' => 'Оператора',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 4,
                'slug' => 'creators',
                'title' => 'Правообладатель',
                'titles' => 'Правообладатели',
                'title_r' => 'Правообладателя',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 5,
                'slug' => 'admins',
                'title' => 'Администратор',
                'titles' => 'Администраторы',
                'title_r' => 'Администратора',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 6,
                'slug' => 'cinema',
                'title' => 'Кинотеатр',
                'titles' => 'Кинотеатры',
                'title_r' => 'Кинотеатра',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],
        ]);
    }
}
