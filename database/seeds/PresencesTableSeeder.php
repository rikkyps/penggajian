<?php

use Illuminate\Database\Seeder;

class PresencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presences')->insert(array(
            array(
                'nik' => '2019010119',
                'tanggal_masuk' => '2019-10-13 08:00:00',
                'tanggal_pulang' => '2019-10-13 16:00:00',
                'kode_kehadiran' => 'H',
            )
        ));
    }
}
