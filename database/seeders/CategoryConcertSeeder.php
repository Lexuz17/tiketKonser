<?php

namespace Database\Seeders;

use App\Models\CategoryConcert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryConcertSeeder extends Seeder
{
    protected $categoryColors = [
        'rgb(220, 20, 140)',
        'rgb(233, 20, 41)',
        'rgb(0, 100, 80)',
        'rgb(83, 122, 161)',
        'rgb(96, 129, 8)',
        'rgb(30, 50, 100)',
    ];

    protected function getRandomColor()
    {
        return $this->categoryColors[array_rand($this->categoryColors)];
    }

    public function run()
    {
        CategoryConcert::create([
            'name' => 'Kpop',
            'gambar' => 'cat1.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Anime',
            'gambar' => 'cat2.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Musik Indonesia',
            'gambar' => 'cat3.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Metal',
            'gambar' => 'cat4.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Jazz',
            'gambar' => 'cat5.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Indie',
            'gambar' => 'cat6.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Party',
            'gambar' => 'cat7.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Classical',
            'gambar' => 'cat8.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Rock',
            'gambar' => 'cat9.jpg',
            'warna' => $this->getRandomColor(),
        ]);
        CategoryConcert::create([
            'name' => 'Pop',
            'gambar' => 'cat10.jpg',
            'warna' => $this->getRandomColor(),
        ]);
    }
}
