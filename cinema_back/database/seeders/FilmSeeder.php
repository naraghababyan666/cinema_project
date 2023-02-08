<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
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
                'is_active' => '1',
                'format_id' => '2',
                'user_id' => 1,
                'rent_id' => 1,
                'platform' => "online",
                'title' => "Harry Poter",
                'description' => "Жизнь Томаса Андерсона разделена на две части: днём он — самый обычный офисный работник, получающий нагоняи от начальства, а ночью превращается в хакера по имени Нео, и нет места в сети, куда он бы не смог проникнуть. Но однажды всё меняется. Томас узнаёт ужасающую правду о реальности",
                'duration' => 40,
                'kdm' =>null,
                'file' => "videos/kfmWpfx5oA.MP4",
                'image' => "images/harry.jpg",
                'certificate_image' => "images/harry.jpg",
                'law_image' => "images/harry.jpg",
                'rating' => 10,
                'rating_all' => 10,
                'created_at' => "2021-10-08 13:20:38",
                'updated_at' => "2021-10-08 13:20:38",

            ]
        ]);
    }
}
