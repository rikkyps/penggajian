<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array(
            array(
                'id_status' => 'TK0',
                'keterangan' => 'Tidak Kawin tidak ada tanggungan',
            ),
        ));
    }
}
