<?php

use Illuminate\Database\Seeder;
use Modules\Account\Entities\FiscalYear;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiscalYear::insert([
            ['name' => '75/76',
                'starting_date' => '2018-07-17',
                'ending_date' => '2019-07-16',
            ]
        ]);
    }
}
