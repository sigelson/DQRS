<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([

                [
                    'name' => 'Cashier',
                    'letter' => 'C',
                    'number' => 1,


                ],
                [
                    'name' => 'Accounting',
                    'letter' => 'A',
                    'number' => 1,


                ],
                [
                    'name' => 'Registrar',
                    'letter' => 'R',
                    'number' => 1,


                ],

            ]
        );
    }
}
