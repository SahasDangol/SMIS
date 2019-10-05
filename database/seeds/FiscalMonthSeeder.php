<?php

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\IncomeExpense;

class FiscalMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomeExpense::insert([
            ['month'=>'Baisakh'],
            ['month'=>'Jestha'],
            ['month'=>'Ashad'],
            ['month'=>'Shrawan'],
            ['month'=>'Bhadra'],
            ['month'=>'Ashwin'],
            ['month'=>'Kartik'],
            ['month'=>'Mangsir'],
            ['month'=>'Poush'],
            ['month'=>'Magh'],
            ['month'=>'Falgun'],
            ['month'=>'Chaitra'],


        ]);
    }
}
