<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(array(
            array(
                'company_name' => 'PT. Putra Sindang Grup',
                'address' => 'Jalan Pasukan Sindangkasih No. 22',
                'email' => 'putrasindanggrup@gmail.com',
                'phone' => '082240376552',
            )
        ));
    }
}
