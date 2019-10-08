<?php

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert(array(
            array(
                'nik' => '2019010119',
                'id_department' => 'DB000001',
                'position_id' => 1,
                'name' => 'Rabbani Nauval',
                'born' => '1995/10/10',
                'address' => 'Tonjong-Majalengka',
                'since' => '2019/10/10',
                'status' => 'Lajang',
                'gender' => 'L',
            ),
        ));
    }
}
