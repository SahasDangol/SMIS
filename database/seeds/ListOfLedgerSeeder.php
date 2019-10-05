<?php

use Illuminate\Database\Seeder;
use Modules\Account\Entities\ListOfLedger;

class ListOfLedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListOfLedger::insert([
           ['name'=>'Cash',
             'under'=>'4',
           ],
           ['name'=>'Student Fees Due',
                'under'=>'2',
           ],
           ['name'=>'Student Fees Income',
                'under'=>'28',
           ],
        ]);
    }
}
