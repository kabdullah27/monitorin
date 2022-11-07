<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'user_code' => 'admin',
            'email_verified_at' => '2022-10-25 15:12:34.000',
            'password' => '$2y$10$I2OLqYyvPfeAdbUBcnLhGOUIqcOAtyHAb9Cg6AEvYCSFTakzWkO1u',
            'status' => 'ACTIVE',
            'timezone' => 'Asia/Jakarta'
        ]);
    }
}
