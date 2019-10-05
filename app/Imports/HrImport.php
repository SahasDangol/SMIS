<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Others\Entities\Department;
use Modules\Others\Entities\Designation;
use Modules\Staff\Entities\Staff;
use Maatwebsite\Excel\Concerns\ToModel;

class HrImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        $staff_count = count(Staff::all()) + 1;
        $hr_id = "hr" . date("Y") . "-" . $staff_count;
        //assigning role for new students as Student



        $designation=Designation::select('id','name')->where('name',ucfirst($row['designation']))->first();
        $department=Department::select('id')->where('name',ucfirst($row['department']))->first();
        $users = User::create([
            'name' => $row['first_name']." ".$row['middle_name']." ".$row['last_name'],
            'email' => $row['email'],
            'password' => Hash::make($hr_id),
            'user_type' => ucfirst($designation->name),
        ]);
        $save = $users->assignRole(ucfirst($designation->name));

        $hr = new Staff([
            'user_id' => $users->id,
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'dob' => get_english_date($row['dob']),
            'gender' => $row['gender'],
            'temporary_address' => $row['temporary_address'],
            'permanent_address' => $row['permanent_address'],
            'nationality' => $row['nationality'],
            'citizenship_no' => $row['citizenship_no'],
            'phone' => $row['phone'],
            'mobile' => $row['mobile'],
            'email' => $row['email'],
            'marital_status' => $row['marital_status'],
            'father_first_name' => $row['father_first_name'],
            'father_middle_name' => $row['father_middle_name'],
            'father_last_name' => $row['father_last_name'],
            'father_phone' => $row['father_phone'],
            'father_mobile' => $row['father_mobile'],
            'father_occupation' => $row['father_occupation'],
            'mother_first_name' => $row['mother_first_name'],
            'mother_middle_name' => $row['mother_middle_name'],
            'mother_last_name' => $row['mother_last_name'],
            'mother_phone' => $row['mother_phone'],
            'mother_mobile' => $row['mother_mobile'],
            'mother_occupation' => $row['mother_occupation'],
            'blood_group'=>$row['blood_group'],
            'comments'=>$row['comments'],
            'joining_date'=>$row['joining_date'],
            'staff_id'=>$hr_id,
            'designation_id'=>$designation->id,
            'department_id'=>$department->id,
            'higher_education_degree'=>$row['higher_education_degree'],
            'grade'=>$row['grade'],
            'institution'=>$row['institution'],
            'institution_address'=>$row['institution_address'],
            'institution_name'=>$row['institution_name'],
            'address'=>$row['address'],
            'work_duration'=>$row['work_duration'],
            'reason_to_leave'=>$row['reason_to_leave'],
            'training_title'=>$row['training_title'],
            'training_duration'=>$row['training_duration'],
            'training_institute_name' => $row['training_institute_name'],
        ]);

        $hr->save();

        $data = [
            'user' => $save,
//            'hr' => $hr,

        ];
        return $data;
    }
}
