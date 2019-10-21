<?php

use Illuminate\Database\Seeder;

class PresenceStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presence_states')->insert(array(
            array(
                'kode_kehadiran' => 'H',
                'keterangan' => 'Hadir'
            ),
            array(
                'kode_kehadiran' => 'S',
                'keterangan' => 'Sakit'
            ),
            array(
                'kode_kehadiran' => 'I',
                'keterangan' => 'Izin'
            ),
            array(
                'kode_kehadiran' => 'C',
                'keterangan' => 'Cuti'
            ),
        ));
    }
}
