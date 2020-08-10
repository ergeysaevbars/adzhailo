<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++){
            Company::create([
                'name' => "Компания $i"
            ]);
        }
    }
}
