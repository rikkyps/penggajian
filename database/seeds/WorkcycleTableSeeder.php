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
                'tanggal' => '2019-08-17',
                'keterangan' => 'HUT Indonesia',
            )
        ));
    }
}
