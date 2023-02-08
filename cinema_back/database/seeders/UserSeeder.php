<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'role_id' => '4',
                'name' => 'ExtraCinema',
                'email' => 'extracinema@mail.ru',
                'email_verified_at' => null,
                'document_verified' => '1',
                'password' => null,
                'open_password' => null,
                'percent' => 50,
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => null,
                'country_code' => '7',
                'phone' => '9188888888',
                'is_active' => '1',
            ],[
                'id' => 2,
                'role_id' => '5',
                'name' => 'Admin',
                'email' => 'admin77@mail.ru',
                'email_verified_at' => null,
                'document_verified' => '2',
                'password' => 'admin123',
                'open_password' => null,
                'percent' => 25,
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => null,
                'country_code' => '7',
                'phone' => '9188888888',
                'is_active' => '1',
            ]
        ]);
    }
}
