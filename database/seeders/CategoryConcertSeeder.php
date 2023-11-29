<?php

namespace Database\Seeders;

use App\Models\CategoryConcert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryConcert::create([
            'name' => 'Kpop',
            'gambar' => 'cat1.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Anime',
            'gambar' => 'cat2.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Musik Indonesia',
            'gambar' => 'cat3.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Metal',
            'gambar' => 'cat4.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Jazz',
            'gambar' => 'cat5.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Indie',
            'gambar' => 'cat6.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Party',
            'gambar' => 'cat7.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Classical',
            'gambar' => 'cat8.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Rock',
            'gambar' => 'cat9.jpg'
        ]);
        CategoryConcert::create([
            'name' => 'Pop',
            'gambar' => 'cat10.jpg'
        ]);
    }
}
