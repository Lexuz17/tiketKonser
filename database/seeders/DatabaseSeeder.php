<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Company;
use App\Models\Concert;
use App\Models\DetailTransaction;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserCartSeeder::class,                   // untuk mengisi data pengguna dan keranjang belanja
            UserProfileSeeder::class,                // untuk mengisi data profil pengguna
            CategoryConcertSeeder::class,            // untuk mengisi data kategori konser
            TransactionSeeder::class,                // untuk membuat dan mengisi transaksi dan payment terkait
            CompanyConcertSeeder::class,             // untuk mengisi data perusahaan dan konser
            TicketSeeder::class,                     // untuk membuat tiket untuk konser dan mengaitkannya dengan transaksi
            CategoryConcertAttachmentSeeder::class,  // untuk mengisi data yang menghubungkan kategori dan konser
            TicketCartAttachmentSeeder::class        // untuk mengisi data yang menghubungkan tiket dan keranjang belanja
        ]);

        // Raw logic
        // $transactions = Transaction::factory()->count(10)->create();

        // foreach ($transactions as $transaction) {
        //     Payment::factory()->count(2)->create(['transaction_id' => $transaction->id]);
        // }

        // $companies = Company::factory(10)->create();

        // $allConcerts = collect(); // Membuat koleksi untuk menyimpan semua konser

        // foreach ($companies as $company) {
        //     $concerts = Concert::factory()->count(2)->create(['company_id' => $company->id]);
        //     $allConcerts = $allConcerts->merge($concerts);
        // }

        // $allTickets = collect();
        // foreach ($allConcerts as $concert) {
        //     $tickets = Ticket::factory()->count(3)->create(['concert_id' => $concert->id]);
        //     $allTickets = $allTickets->merge($tickets);
        // }

        // foreach ($transactions as $transaction) {
        //     $randomTickets = $allTickets->random(3);
        //     foreach ($randomTickets as $ticket) {
        //         // Buat detail transaksi
        //         DetailTransaction::factory()->create([
        //             'transaction_id' => $transaction->id,
        //             'ticket_id' => $ticket->id,
        //         ]);
        //     }
        // }

        // $allConcerts->each(function ($concert) {
        //     $randomCategoryCount = rand(1, 3);
        //     $randomCategoryIds = range(1, 10);
        //     shuffle($randomCategoryIds);
        //     $randomCategoryIds = array_slice($randomCategoryIds, 0, $randomCategoryCount);

        //     $concert->categories()->attach($randomCategoryIds);
        // });

        // $ticket10 = $allTickets->random(10);

        // $ticket10->each(function ($ticket) {
        //     $randomCartCount = rand(1, 2);
        //     $randomCarts = Cart::inRandomOrder()->limit($randomCartCount)->get();

        //     $ticket->carts()->attach($randomCarts);
        // });
    }
}
