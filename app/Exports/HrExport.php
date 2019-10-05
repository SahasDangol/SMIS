<?php

namespace App\Exports;

use Modules\Staff\Entities\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HrExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::all();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'id',
            'user_id',
            'first_name',
            'middle_name',
            'last_name',
            'dob',
            'gender',
            'temporary_address',
            'permanent_address',
            'nationality',
            'citizenship_no',
            'phone',
            'mobile',
            'email',
            'marital_status',
            'father_first_name',
            'father_middle_name',
            'father_last_name',
            'father_phone',
            'father_mobile',
            'father_occupation',
            'mother_first_name',
            'mother_middle_name',
            'mother_last_name',
            'mother_phone',
            'mother_mobile',
            'mother_occupation',
            'blood_group',
            'comments',
            'joining_date',
            'staff_id',
            'designation_id',
            'department_id',
            'higher_education_degree',
            'grade',
            'institution',
            'institution_address',
            'institution_name',
            'address',
            'work_duration',
            'reason_to_leave',
            'training_title',
            'training_duration',
            'training_institute_name',
//            'status',
//            'remarks',
//            'post_by',
//            'is_verified',
//            'verified_at',
//            'verified_by',
//            'hits',
        ];
    }
}
