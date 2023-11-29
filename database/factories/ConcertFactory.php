<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\concerts>
 */
class ConcertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        $image = ['event1.jpg', 'event2.jpg', 'event3.jpg', 'event4.jpg', 'event5.jpg', 'event6.jpg', 'event7.jpg'];
        $bannerMapping = [
            'event1.jpg' => 'banner3.jpg',
            'event2.jpg' => 'banner2.jpg',
            'event6.jpg' => 'banner1.jpg',
            'event7.jpg' => 'banner4.jpg',
        ];

        $gambar = $faker->randomElement($image);
        $banner = isset($bannerMapping[$gambar]) ? $bannerMapping[$gambar] : null;

        return [
            'nama_konser' => $faker->sentence(2),
            'tanggal' => $faker->dateTimeBetween('-2 year', '+1 year')->format('Y-m-d'),
            'waktu' => $faker->time(),
            'tempat' => $faker->randomElement(['Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar']),
            'gambar' => $gambar,
            'banner' => $banner,
        ];
    }
}
