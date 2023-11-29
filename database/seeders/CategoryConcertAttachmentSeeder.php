<?php

namespace Database\Seeders;

use App\Models\Concert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryConcertAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allConcerts = Concert::all();

        $allConcerts->each(function ($concert) {
            $randomCategoryCount = rand(1, 3);
            $randomCategoryIds = range(1, 10);
            shuffle($randomCategoryIds);
            $randomCategoryIds = array_slice($randomCategoryIds, 0, $randomCategoryCount);

            $concert->categories()->attach($randomCategoryIds);
        });
    }
}
