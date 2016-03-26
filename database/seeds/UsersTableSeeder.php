<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'alexandre',
            'email' => 'alex.gory02@gmail.com',
            'password' => bcrypt('alexandre'),
            'role' => 'ROLE_ADMIN'
        ]);
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@agnamstore.com',
            'password' => bcrypt('secret'),
            'role' => 'ROLE_USER'
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@agnamstore.com',
            'password' => bcrypt('secret'),
            'role' => 'ROLE_ADMIN'
        ]);
    }
}
