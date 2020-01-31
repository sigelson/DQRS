<?php

use Illuminate\Database\Seeder;

class CounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counters')->insert([

            [
                'name' => 'Counter 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Counter 2',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);


    }
}
