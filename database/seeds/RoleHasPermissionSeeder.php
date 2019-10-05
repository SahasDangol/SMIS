<?php

use App\RoleHasPermission;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 248; $i++) {
            RoleHasPermission::insert([
                ['permission_id' => $i,
                    'role_id' => '1'],

            ]);
        }
        RoleHasPermission::insert([
            ['permission_id' => '9',
                'role_id' => '2'],
            ['permission_id' => '13',
                'role_id' => '2'],
            ['permission_id' => '17',
                'role_id' => '2'],
            ['permission_id' => '21',
                'role_id' => '2'],
            ['permission_id' => '33',
                'role_id' => '2'],
            ['permission_id' => '37',
                'role_id' => '2'],
            ['permission_id' => '41',
                'role_id' => '2'],
            ['permission_id' => '45',
                'role_id' => '2'],
            ['permission_id' => '49',
                'role_id' => '2'],
            ['permission_id' => '54',
                'role_id' => '2'],
            ['permission_id' => '57',
                'role_id' => '2'],
            ['permission_id' => '85',
                'role_id' => '2'],
            ['permission_id' => '89',
                'role_id' => '2'],
            ['permission_id' => '97',
                'role_id' => '2'],
            ['permission_id' => '105',
                'role_id' => '2'],
            ['permission_id' => '109',
                'role_id' => '2'],
            ['permission_id' => '113',
                'role_id' => '2'],
//            ['permission_id' => '161',
//                'role_id' => '2'],
//            ['permission_id' => '158',
//                'role_id' => '2'],

            ['permission_id' => '5',
                'role_id' => '3'],
            ['permission_id' => '6',
                'role_id' => '3'],
            ['permission_id' => '7',
                'role_id' => '3'],
            ['permission_id' => '8',
                'role_id' => '3'],
            ['permission_id' => '9',
                'role_id' => '3'],
            ['permission_id' => '13',
                'role_id' => '3'],
            ['permission_id' => '17',
                'role_id' => '3'],
            ['permission_id' => '21',
                'role_id' => '3'],
            ['permission_id' => '25',
                'role_id' => '3'],
            ['permission_id' => '29',
                'role_id' => '3'],
            ['permission_id' => '33',
                'role_id' => '3'],
            ['permission_id' => '37',
                'role_id' => '3'],
            ['permission_id' => '45',
                'role_id' => '3'],
            ['permission_id' => '49',
                'role_id' => '3'],
            ['permission_id' => '50',
                'role_id' => '3'],
            ['permission_id' => '54',
                'role_id' => '3'],
            ['permission_id' => '57',
                'role_id' => '3'],
            ['permission_id' => '81',
                'role_id' => '3'],
            ['permission_id' => '82',
                'role_id' => '3'],
            ['permission_id' => '85',
                'role_id' => '3'],
            ['permission_id' => '89',
                'role_id' => '3'],
            ['permission_id' => '97',
                'role_id' => '3'],
            ['permission_id' => '109',
                'role_id' => '3'],

            ['permission_id' => '153',
                'role_id' => '3'],
//            ['permission_id' => '161',
//                'role_id' => '3'],


            ['permission_id' => '185',
                'role_id' => '4'],

            ['permission_id' => '186',
                'role_id' => '4'],

            ['permission_id' => '187',
                'role_id' => '4'],

            ['permission_id' => '188',
                'role_id' => '4'],

            ['permission_id' => '189',
                'role_id' => '4'],

            ['permission_id' => '190',
                'role_id' => '4'],


            ['permission_id' => '191',
                'role_id' => '4'],

            ['permission_id' => '192',
                'role_id' => '4'],

            ['permission_id' => '193',
                'role_id' => '4'],

            ['permission_id' => '194',
                'role_id' => '4'],

            ['permission_id' => '195',
                'role_id' => '4'],

            ['permission_id' => '196',
                'role_id' => '4'],


            ['permission_id' => '197',
                'role_id' => '4'],

            ['permission_id' => '198',
                'role_id' => '4'],

            ['permission_id' => '199',
                'role_id' => '4'],

            ['permission_id' => '200',
                'role_id' => '4'],

            ['permission_id' => '201',
                'role_id' => '4'],

            ['permission_id' => '202',
                'role_id' => '4'],


            ['permission_id' => '203',
                'role_id' => '4'],

            ['permission_id' => '204',
                'role_id' => '4'],
            ['permission_id' => '205',
                'role_id' => '4'],
            ['permission_id' => '206',
                'role_id' => '4'],
            ['permission_id' => '207',
                'role_id' => '4'],
            ['permission_id' => '208',
                'role_id' => '4'],
            ['permission_id' => '149',
                'role_id' => '4'],
            ['permission_id' => '150',
                'role_id' => '4'],
            ['permission_id' => '151',
                'role_id' => '4'],
            ['permission_id' => '152',
                'role_id' => '4'],
            ['permission_id' => '137',
                'role_id' => '4'],
            ['permission_id' => '138',
                'role_id' => '4'],
            ['permission_id' => '139',
                'role_id' => '4'],
            ['permission_id' => '140',
                'role_id' => '4'],
            ['permission_id' => '25',
                'role_id' => '4'],
            ['permission_id' => '26',
                'role_id' => '4'],
            ['permission_id' => '27',
                'role_id' => '4'],
            ['permission_id' => '28',
                'role_id' => '4'],
            ['permission_id' => '217',
                'role_id' => '4'],
            ['permission_id' => '218',
                'role_id' => '4'],
            ['permission_id' => '219',
                'role_id' => '4'],
            ['permission_id' => '220',
                'role_id' => '4'],



            ['permission_id' => '9',
                'role_id' => '5'],
            ['permission_id' => '13',
                'role_id' => '5'],
            ['permission_id' => '17',
                'role_id' => '5'],
            ['permission_id' => '21',
                'role_id' => '5'],
            ['permission_id' => '29',
                'role_id' => '5'],
            ['permission_id' => '33',
                'role_id' => '5'],

            ['permission_id' => '41',
                'role_id' => '5'],
            ['permission_id' => '45',
                'role_id' => '5'],
            ['permission_id' => '49',
                'role_id' => '5'],
            ['permission_id' => '50',
                'role_id' => '5'],
            ['permission_id' => '51',
                'role_id' => '5'],
            ['permission_id' => '52',
                'role_id' => '5'],

            ['permission_id' => '54',
                'role_id' => '5'],
            ['permission_id' => '58',
                'role_id' => '5'],
            ['permission_id' => '69',
                'role_id' => '5'],
            ['permission_id' => '70',
                'role_id' => '5'],
            ['permission_id' => '71',
                'role_id' => '5'],
            ['permission_id' => '72',
                'role_id' => '5'],

            ['permission_id' => '73',
                'role_id' => '5'],
            ['permission_id' => '74',
                'role_id' => '5'],
            ['permission_id' => '75',
                'role_id' => '5'],
            ['permission_id' => '76',
                'role_id' => '5'],
            ['permission_id' => '77',
                'role_id' => '5'],
            ['permission_id' => '78',
                'role_id' => '5'],

            ['permission_id' => '79',
                'role_id' => '5'],
            ['permission_id' => '80',
                'role_id' => '5'],
            ['permission_id' => '85',
                'role_id' => '5'],
            ['permission_id' => '89',
                'role_id' => '5'],
            ['permission_id' => '97',
                'role_id' => '5'],
            ['permission_id' => '105',
                'role_id' => '5'],
            ['permission_id' => '113',
                'role_id' => '5'],
//            ['permission_id' => '157',
//                'role_id' => '5'],
//            ['permission_id' => '161',
//                'role_id' => '5'],

        ]);


    }
}
