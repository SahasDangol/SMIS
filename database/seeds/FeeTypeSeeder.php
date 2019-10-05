<?php

use Illuminate\Database\Seeder;
use Modules\StudentFee\Entities\FeeType;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      FeeType::insert([
          ['fee_code'=>'01',
          'fee_type'=>'Admission Fee',
          'fee_title'=>'Student Admission Fee',
          'amount'=>'20000'],

          ['fee_code'=>'02',
          'fee_type'=>'Monthly Fee',
              'fee_title'=>'Student Monthly Fee',
          'amount'=>'1500'],

          ['fee_code'=>'03',
          'fee_type'=>'Miscellaneous Fee',
              'fee_title'=>'Student Miscellaneous Fee',
          'amount'=>'1000'],


      ]);
    }
}
