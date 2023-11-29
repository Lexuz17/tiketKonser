<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payments>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        $type = ['Kartu Debit', 'Kartu Kredit', 'Virtual Account BCA', 'GoPay', 'ATM Transfer', 'LinkAja', 'ShopeePay'];

        return [
            'metode_pembayaran' => $faker->randomElement($type),
            'nomor_kartu' => $faker->creditCardNumber,
            'nama_bank' => $faker->optional()->randomElement(['BCA', 'BRI', 'Mandiri', null]),
        ];
    }
}
