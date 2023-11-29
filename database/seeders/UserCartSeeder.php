<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(20)->create();

        $user1 = User::create([
            'email' => 'jason@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user2 = User::create([
            'email' => 'daffa@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user3 = User::create([
            'email' => 'alex@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user4 = User::create([
            'email' => 'vincent@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user5 = User::create([
            'email' => 'edbert@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user1->cart()->create();
        $user2->cart()->create();
        $user3->cart()->create();
        $user4->cart()->create();
        $user5->cart()->create();
    }
}
