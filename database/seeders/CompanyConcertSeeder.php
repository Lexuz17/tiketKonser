<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Concert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(15)->create();

        $allConcerts = collect();

        foreach ($companies as $company) {
            $concerts = Concert::factory()->count(20)->create(['company_id' => $company->id]);
            $allConcerts = $allConcerts->merge($concerts);
        }
    }
}
