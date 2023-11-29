<?php

namespace Database\Seeders;

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
            UserCartSeeder::class,
            UserProfileSeeder::class,
            CategoryConcertSeeder::class,
            // CompanyConcertTicketSeeder::class,
        ]);

        // Company::factory(10)->has(
        //     Concert::factory()->has(
        //         Ticket::factory()->count(3)
        //     )->count(2)
        // )->create();

        // Transaction::factory(5)->has(
        //     Payment::factory()
        // )->create();

        // Membuat 10 perusahaan
        $companies = Company::factory(10)->create();

        foreach ($companies as $company) {
            $concerts = Concert::factory()->has(
                Ticket::factory()->count(3)->state([
                    'concert_id' => function () use ($company) {
                        return $company->concerts->random()->id;
                    },
                ])
            )->count(2)->create(['company_id' => $company->id]);

            foreach ($concerts as $concert) {
                $tickets = $concert->tickets;

                // Simpan tiket-tiket ke dalam detail transaksi
                $detailTransaction = DetailTransaction::factory()->create();

                // Hubungkan tiket-tiket dengan detail transaksi
                $detailTransaction->tickets()->attach($tickets->pluck('id')->toArray());
            }
        }
    }
}
