<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\Ticket;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = Transaction::all();

        $allConcerts = Concert::all();

        $allTickets = collect();
        foreach ($allConcerts as $concert) {
            $tickets = Ticket::factory()->count(3)->create(['concert_id' => $concert->id]);
            $allTickets = $allTickets->merge($tickets);
        }

        foreach ($transactions as $transaction) {
            $randomTickets = $allTickets->random(3);
            foreach ($randomTickets as $ticket) {
                DetailTransaction::factory()->create([
                    'transaction_id' => $transaction->id,
                    'ticket_id' => $ticket->id,
                ]);
            }
        }
    }
}
