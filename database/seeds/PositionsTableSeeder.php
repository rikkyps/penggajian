<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(array(
            array(
                'name' => 'Kasir',
                'tunjangan' => '100000',
            ),
        ));
    }
}
