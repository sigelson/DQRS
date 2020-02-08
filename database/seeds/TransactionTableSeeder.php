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
                    'name' => 'Accounting',
                    'transaction' => 'Statement of Account',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Accounting',
                    'transaction' => 'Examination Permit',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Accounting',
                    'transaction' => 'Payment Breakdown',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Registrar',
                    'transaction' => 'Request document',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'name' => 'Registrar',
                    'transaction' => 'Claim a document',
                    'created_at' => now(),
                    'updated_at' => now()

                ],







            ]
        );
    }
}
