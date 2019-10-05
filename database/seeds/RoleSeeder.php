<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name'=>'Admin',
                'guard_name'=>'web'],
            ['name'=>'Principal',
                'guard_name'=>'web'],
            ['name'=>'Teacher',
                'guard_name'=>'web'],
            ['name'=>'Accountant',
                'guard_name'=>'web'],
            ['name'=>'Receptionist',
                'guard_name'=>'web'],
            ['name'=>'Lab Incharge',
                'guard_name'=>'web'],
            ['name'=>'Sports Teacher',
                'guard_name'=>'web'],
            ['name'=>'Peon',
                'guard_name'=>'web'],
            ['name'=>'Gardener',
                'guard_name'=>'web'],
            ['name'=>'Driver',
                'guard_name'=>'web'],
            ['name'=>'Student',
                'guard_name'=>'web'],
        ]);
    }
}
