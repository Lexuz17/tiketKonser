<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyConcertTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = Company::factory(10)->has(
            $concerts = Concert::factory()->has(
                $tickets = Ticket::factory()->count(3)
            )->count(2)
        )->create();
    }
}
