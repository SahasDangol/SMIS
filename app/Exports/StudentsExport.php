<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Student\Entities\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    /**
     * @return array
     */
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
            'religion',
            'personal_photo',
            'blood_group',

            'comments',
            'height',
            'weight',
            'father_first_name',
            'father_middle_name',
            'father_last_name',
            'father_phone',
            'father_mobile',
            'father_occupation',
            'father_photo',
            'mother_first_name',
            'mother_middle_name',
            'mother_last_name',
            'mother_phone',
            'mother_mobile',
            'mother_occupation',
            'mother_photo',
            'guardian_first_name',
            'guardian_middle_name',
            'guardian_last_name',
            'guardian_relation',
            'guardian_email',
            'guardian_phone',
            'guardian_mobile',
            'guardian_temporary_address',
            'guardian_permanent_address',
            'guardian_occupation',
            'guardian_photo',
            'previous_school_name',
            'previous_class',
            'grade',
            'file',
            'previous_school_address',
            'previous_school_phone',
            'previous_school_email',
            'route',
            'percentage',
            'reason',
            'siblings',
            'admission_id',
            'admission_date',
            'roll_no',
            'house_id',
            'section_id',
            'classroom_id',
            'status',
            'remarks',
            'post_by',
            'is_verified',
            'verified_at',
            'verified_by',
            'hits','created_at','updated_at'
        ];
    }
}
