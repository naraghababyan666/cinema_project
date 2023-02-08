<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upload_docs')->insert([
            [
                'id' => 99,
                'user_id' => '1',
                'verified' => 1,
                'hall_type' => 'municipal',
                'personName' => "OOO 'Film'",
                'name_theatre' => 'Красный площадь',
                'document_ogrn_text' => "aaaaaaaaaa",
                'document_ogrn_photo' => "media_library/1638817542_blue-eyed-wolf-4k_1542238170.jpg",
                'region' => "Московская область",
                'city' => "Красная пл., 3",
                'house' => "ГУМ ",
                'person_name' => '["Владимир Путин"]',
                'person_position' => "Директор",
                'person_photo' => '[{"person_photo_0":"media_library\/1638817542_blue-eyed-wolf-4k_1542238170.jpg"}]',
                'new_hall_name' => "Royal Albert Hall",
                'new_hall_scheme_photo' => "media_library/1638817542_blue-eyed-wolf-4k_1542238170.jpg",
                'new_hall_row_count' => '"[\"33\"]"',
                'new_hall_seat_count' => '"[\"33\"]"',
                'new_hall_hardware_description' => "Voice hardware",
                'new_hall_hardware_photo' => "media_library/1638817542_blue-eyed-wolf-4k_1542238170.jpg",
                'new_hall_screen_width' => "12",
                'new_hall_screen_length' => "12",
                'created_at' => "2021-10-08 13:20:38",
                'updated_at' => "2021-10-08 13:20:38",

            ]
        ]);
    }
}
