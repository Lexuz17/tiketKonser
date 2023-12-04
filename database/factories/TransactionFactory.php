<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactions>
 */
class TransactionFactory extends Factory
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
        $status_pembayaran = ['Pending', 'Success', 'Failed','Pending', 'Success', 'Pending', 'Success'];
        $currentTime = now();
        return [
            'user_id' => rand(1,5),
            'tanggal' => $faker->dateTimeThisYear(),
            'waktu' => $currentTime->addHours(rand(2,4)),
            'total_ticket' => $faker->numberBetween(1, 5),
            'total_harga_detail' => round($faker->numberBetween(100000, 25000000), -3),
            'nama_lengkap' => $faker->name(),
            'no_telp' => $faker->phoneNumber(),
            'email' => $faker->safeEmail(),
            'nomor_ktp' => $faker->numerify('#############'),
            'metode_pembayaran' => $faker->randomElement($type),
            'status_pembayaran' => $faker->randomElement($status_pembayaran)
        ];
    }
}
