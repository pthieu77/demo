<?php

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
        DB::table('roles')->insert([[
            'name' => 'admin',
            'display_name' => 'Admin',
        ], [
            'name' => 'user',
            'display_name' => 'User',
        ]]);

        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ], [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]]);
    }
}
