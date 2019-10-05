<?php

use Illuminate\Database\Seeder;
use Modules\Staff\Entities\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(Staff::class, 1000)->create();
    }
}
