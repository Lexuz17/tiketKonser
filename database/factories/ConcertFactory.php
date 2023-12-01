<?php

namespace Database\Factories;

use App\Models\Concert;
use Carbon\Carbon;
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

        $waktuStart = Carbon::parse($faker->time());
        $waktuEnd = $waktuStart->copy()->addHours(2);

        return [
            'nama_konser' => function () use ($faker) {
                $value = $faker->unique()->sentence(2);
                // Supaya gak ada nama yg sama pas di seeding.
                while (Concert::where('nama_konser', $value)->exists()) {
                    $value = $faker->unique()->sentence(2);
                }

                return $value;
            },
            'tanggal' => $faker->dateTimeBetween('-2 year', '+1 year')->format('Y-m-d'),
            'waktu_start' => $waktuStart->format('H:i'),
            'waktu_end' => $waktuEnd->format('H:i'),
            'tempat' => $faker->randomElement(['Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar']),
            'gambar' => $gambar,
            'banner' => $banner,
            'desc' => implode("\n", $faker->paragraphs(20)),
        ];
    }
}
