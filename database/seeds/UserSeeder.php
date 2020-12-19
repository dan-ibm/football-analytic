<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Make user seeder for filling user with admin role
         */
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@iitu.kz',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);
    }
}
