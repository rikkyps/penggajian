<?php

use Illuminate\Database\Seeder;

class WorkcycleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workcycles')->insert(array(
            array(
                'tanggal' => '',
                'keterangan' => '',
            )
        ));
    }
}
