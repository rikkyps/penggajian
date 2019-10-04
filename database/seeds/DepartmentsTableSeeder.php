<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(array(
            array(
                'department_id' => 'DB000001',
                'name' => 'Supervisor',
            ),
            array(
                'department_id' => 'DB000002',
                'name' => 'Admin Kasir',
            ),
            array(
                'department_id' => 'DB000003',
                'name' => 'Kasir',
            ),
            array(
                'department_id' => 'DB000004',
                'name' => 'Petugas Lapangan',
            ),
        ));
    }
}
