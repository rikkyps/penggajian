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
                'name' => 'RSD Gunung Jati',
            ),
            array(
                'department_id' => 'DB000002',
                'name' => 'RSUD Cideres',
            ),
        ));
    }
}
