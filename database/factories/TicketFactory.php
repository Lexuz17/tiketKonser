<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        $kategori = ['VIP', 'VVIP', 'Regular', 'Gold', 'Silver', 'Bronze'];
        $tanggalSelesai = $faker->dateTimeBetween('2023-01-01', '2024-12-31');
        $tanggalMulai = $faker->dateTimeBetween('2023-01-01', $tanggalSelesai);
        return [
            'kategori' => $faker->randomElement($kategori),
            'harga' => round($faker->numberBetween(500000, 3000000), -3),
            'jumlah_tersedia' => $faker->numberBetween(1, 100),
            'tanggal_mulai_penjualan' => $tanggalMulai->format('Y-m-d'),
            'tanggal_selesai_penjualan' => $tanggalSelesai->format('Y-m-d'),
        ];
    }
}
