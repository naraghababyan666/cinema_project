<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seance_statuses')->insert([
            [
                'id' => 1,
                'color' => 'primary',
                'title' => 'ожидается',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 2,
                'color' => 'success',
                'title' => 'идёт',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 3,
                'color' => 'default',
                'title' => 'завершён',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ],[
                'id' => 4,
                'color' => 'danger',
                'title' => 'отменён',
                'created_at' => '2021-03-24 20:29:48',
                'updated_at' => '2021-03-24 20:29:48',
            ]
        ]);
    }
}
