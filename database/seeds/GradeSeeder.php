<?php

use Illuminate\Database\Seeder;
use Modules\Exam\Entities\MarkGrade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarkGrade::insert([
            ['name' => 'A+',
                'grade_point' => '4',
                'grade_from' => '3.6',
                'grade_upto' => '4',
                'from' => '90',
                'upto' => '100',
            ],
            ['name' => 'A',
                'grade_point' => '3.6',
                'grade_from' => '3.2',
                'grade_upto' => '3.6',
                'from' => '80',
                'upto' => '90',
            ],
            ['name' => 'B+',
                'grade_point' => '3.2',
                'grade_from' => '2.8',
                'grade_upto' => '3.2',
                'from' => '70',
                'upto' => '80',
            ],
            ['name' => 'B',
                'grade_point' => '2.8',
                'grade_from' => '2.4',
                'grade_upto' => '2.8',
                'from' => '60',
                'upto' => '70',
            ],
            ['name' => 'C+',
                'grade_point' => '2.4',
                'grade_from' => '2',
                'grade_upto' => '2.4',
                'from' => '50',
                'upto' => '60',
            ],
            ['name' => 'C',
                'grade_point' => '2',
                'grade_from' => '1.6',
                'grade_upto' => '2',
                'from' => '40',
                'upto' => '50',
            ],
            ['name' => 'D+',
                'grade_point' => '1.6',
                'grade_from' => '1.2',
                'grade_upto' => '1.6',
                'from' => '30',
                'upto' => '40',
            ],
            ['name' => 'D',
                'grade_point' => '1.2',
                'grade_from' => '0.8',
                'grade_upto' => '1.2',
                'from' => '20',
                'upto' => '30',
            ],
            ['name' => 'E',
                'grade_point' => '0.8',
                'grade_from' => '0.1',
                'grade_upto' => '0.8',
                'from' => '1',
                'upto' => '20',
            ],
            ['name' => 'N',
                'grade_point' => '0',
                'grade_from' => '0',
                'grade_upto' => '0.1',
                'from' => '0',
                'upto' => '0.1',
            ],
        ]);
    }
}
