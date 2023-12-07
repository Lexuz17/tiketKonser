<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $transactions = Transaction::factory()->count(50)->create();

        foreach ($transactions as $transaction) {
            Payment::factory()->create(['transaction_id' => $transaction->id]);
        }
    }
}
