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
        DB::table('users')->insert(array(
            array(
                'name' => 'Riky Permana Putra',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
            )
        ));
    }
}
