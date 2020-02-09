<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([

                [
                    'department' => 'Accounting',
                    'name' => 'Statement of Account',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'department' => 'Accounting',
                    'name' => 'Examination Permit',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'department' => 'Accounting',
                    'name' => 'Payment Breakdown',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'department' => 'Registrar',
                    'name' => 'Request document',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Registrar',
                    'transaction' => 'Claim a document',
                    'created_at' => now(),
                    'updated_at' => now()

                ],

                [
                    'name' => 'Cashier',
                    'transaction' => 'Tuition Fee',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Cashier',
                    'transaction' => 'Miscellaneous Fee',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Cashier',
                    'transaction' => 'Business Centre',
                    'created_at' => now(),
                    'updated_at' => now()

                ],







            ]
        );
    }
}
