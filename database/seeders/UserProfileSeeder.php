<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        UserProfile::create([
            'user_id' => '1',
            'nama_depan' => 'Jason',
            'gambar' => 'Jason.jpg',
            'nama_belakang' => 'Susanto',
            'no_telp' => $faker->phoneNumber(),
            'gender' => 'laki-laki',
            'dob' => $faker->date()
        ]);

        UserProfile::create([
            'user_id' => '2',
            'nama_depan' => 'Daffa',
            'gambar' => 'Daffa.jpg',
            'nama_belakang' => 'Rasya',
            'no_telp' => $faker->phoneNumber(),
            'gender' => 'laki-laki',
            'dob' => $faker->date()
        ]);

        UserProfile::create([
            'user_id' => '3',
            'nama_depan' => 'Alexander',
            'gambar' => 'Alexander.jpg',
            'nama_belakang' => 'Theodore',
            'no_telp' => $faker->phoneNumber(),
            'gender' => 'laki-laki',
            'dob' => $faker->date()
        ]);

        UserProfile::create([
            'user_id' => '4',
            'nama_depan' => 'Vincent',
            'gambar' => 'Vincent.jpg',
            'nama_belakang' => 'Junior',
            'no_telp' => $faker->phoneNumber(),
            'gender' => 'laki-laki',
            'dob' => $faker->date()
        ]);

        UserProfile::create([
            'user_id' => '5',
            'nama_depan' => 'Edbert',
            'gambar' => 'Edbert.jpg',
            'nama_belakang' => 'Angky',
            'no_telp' => $faker->phoneNumber(),
            'gender' => 'laki-laki',
            'dob' => $faker->date()
        ]);
    }
}
