<?php

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = ['Смена 1', 'Смена 2', 'Ночь'];
        foreach ($shifts as $shift)
            Shift::create(['name' => $shift]);
    }
}
