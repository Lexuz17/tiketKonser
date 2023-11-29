<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCartAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allTickets = Ticket::all()->random(10);

        $allTickets->each(function ($ticket) {
            $randomCartCount = rand(1, 2);
            $randomCarts = Cart::inRandomOrder()->limit($randomCartCount)->get();

            $ticket->carts()->attach($randomCarts);
        });
    }
}
