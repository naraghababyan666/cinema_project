<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallInDocumentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halls_in_document')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'name_hall' => 'Royal Albert Hall',
                'name_theatre' => 'Красный площадь',
                'region' => 'Московская область',
                'city' => 'Красная пл., 3',
                'house' => 'ГУМ',
                'hall_seats' => 80,
                'hall_rows' => 8,
                'voice_hardware' => 'Voice hardware',
                'screen_width' => 12,
                'screen_length' => 12,
            ]
        ]);
    }
}
