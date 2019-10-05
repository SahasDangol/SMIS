<?php

use Illuminate\Database\Seeder;
use Modules\Account\Entities\ListOfLedger;
use Modules\Others\Entities\Department;
use Modules\Others\Entities\Designation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        $this->call(UserSeeder::class);
        $this->call(FiscalYearSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(ModelHasRolesSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(ListOfLedgerSeeder::class);
        $this->call(FiscalMonthSeeder::class);

    }
}
