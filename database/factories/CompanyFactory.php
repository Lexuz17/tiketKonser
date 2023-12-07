<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'nama' => $faker->company(),
            'logo' => $faker->imageUrl(360, 360, 'Company', true),
            'since' => $faker->year(),
            'desc' => implode("\n", $faker->paragraphs(2)),
        ];
    }
}
