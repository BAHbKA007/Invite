<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Qwe',
            'email' => 'qwe@qwe.de',
            'password' => bcrypt('090587'),
        ]);

        DB::table('users')->insert([
            'name' => 'Johann',
            'email' => 'peniskopfbacken@gmail.com',
            'password' => bcrypt('090587'),
        ]);

        DB::table('projects')->insert([
            'title' => 'Pokern',
            'user_id' => 1,
            'phone' => '4915205780034'
        ]);

        DB::table('projects')->insert([
            'title' => 'Geburtstag',
            'user_id' => 1,
        ]);
    }
}