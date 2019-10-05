<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\Guardian;
use Modules\Student\Entities\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Student\Entities\StudentSession;

class GuardiansImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //assigning role for new guardians as Student

        $users = User::create([
        'name' =>$row['guardian_first_name']." ".$row['guardian_middle_name']." ".$row['guardian_last_name'],
        'email' => $row['guardian_mobile'],
        'password' => Hash::make("password"),
            'user_type' => 'Guardian',
            ]);
        $save = $users->assignRole('Student');


        $guardian = new Guardian([
        'guardian_first_name' => $row['guardian_first_name'],
       'guardian_middle_name' => $row['guardian_middle_name'],
       'guardian_last_name' =>$row['guardian_last_name'],
       'guardian_email' => $row['guardian_email'],
       'guardian_phone' => $row['guardian_phone'],
       'guardian_mobile' => $row['guardian_mobile'],
       'guardian_temporary_address' => $row['guardian_temporary_address'],
       'guardian_permanent_address'=> $row['guardian_permanent_address'],
       'guardian_occupation'=> $row['guardian_occupation'],
       ]);
        $guardian->save();
            /*            'status' => $row['status'],
                        'remarks' => $row['remarks'],
                        'post_by' => $row['post_by'],
                        'is_verified' => $row['is_verified'],
                        'verified_at' => $row['verified_at'],
                        'verified_by' => $row['verified_by'],
                        'hits' => $row['hits'],*/




        $data = [

            'user' => $save,
        ];

        return $data;
    }
}
