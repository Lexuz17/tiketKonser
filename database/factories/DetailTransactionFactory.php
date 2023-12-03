<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Transaction;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detail_transactions>
 */
class DetailTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        return [
            'transaction_id' => function () {
                return Transaction::factory()->create()->id;
            },
            'ticket_id' => function () {
                return Ticket::factory()->create()->id;
            },
            'jumlah_ticket' => $faker->numberBetween(1, 5),
            'jumlah_harga_detail' => round($faker->numberBetween(500000, 10000000), -3)
        ];
    }
}
