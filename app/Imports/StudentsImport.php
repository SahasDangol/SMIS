<?php

namespace App\Imports;

use App\User;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Validator;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\Guardian;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;


class StudentsImport implements ToCollection, SkipsOnFailure, WithHeadingRow
{
    use SkipsFailures;
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $rows = $rows->toArray();

        foreach ($rows as $row) {

            $row['classroom_id'] = Classroom::select('id')->whereRaw('lower(class_name) like (?)', strtolower($row['classroom_id']))->first()->id;

            /*retrieving section id*/
            if ($row['section_id']) {
                $section = $row['section_id'];
            } else {
                $section = 'default';
            }
            $section_id = Section::select('id')->where('classroom_id', $row['classroom_id'])->where('name', $section)->first()->id;

            /*generating roll number*/

            $last_roll = count(Student::select('students.id')
                ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                ->where('student_sessions.classroom_id', $row['classroom_id'])
                ->where('student_sessions.section_id', $row['section_id'])
                ->where('students.status', '1')
                ->get());

            $last_roll = $last_roll + 1;
            $roll = "stu";

            $roll = $roll . get_academic_year() . $section_id . "-" . $last_roll;
//            $roll = $roll . get_academic_year() . $row['section_id'] . "-" . $last_roll;


            /*Registering Guardian*/
            $guardian = Guardian::select('id')->where('guardian_mobile', $row['guardian_mobile'])->first();
            if (!$guardian) {
                $users = User::create([
                    'name' => $row['guardian_first_name'] . " " . $row['guardian_middle_name'] . " " . $row['guardian_last_name'],
                    'email' => $row['guardian_mobile'],
                    'password' => Hash::make("password"),
                    'user_type' => 'Guardian',
                ]);

                $save = $users->assignRole('Student');
                $guardian = new Guardian([
                    'guardian_first_name' => $row['guardian_first_name'],
                    'guardian_middle_name' => $row['guardian_middle_name'],
                    'guardian_last_name' => $row['guardian_last_name'],
                    'guardian_email' => $row['guardian_email'],
                    'guardian_phone' => $row['guardian_phone'],
                    'guardian_mobile' => $row['guardian_mobile'],
                    'guardian_temporary_address' => $row['guardian_temporary_address'],
                    'guardian_permanent_address' => $row['guardian_permanent_address'],
                    'guardian_occupation' => $row['guardian_occupation'],
                    'user_id' => $users->id,
                ]);

                $guardian->save();
            }

            /*registering students*/
            $student = new Student([
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'dob' => get_english_date($row['dob']),
//                'dob' => $row['dob'],
                'gender' => $row['gender'],
                'temporary_address' => $row['temporary_address'],
                'permanent_address' => $row['permanent_address'],
                'nationality' => $row['nationality'],
                'religion' => $row['religion'],
                'personal_photo' => $row['personal_photo'],
                'blood_group' => $row['blood_group'],
                'comments' => $row['comments'],
                'height' => $row['height'],
                'weight' => $row['weight'],
                'guardian_id' => $guardian->id,
                'relation' => $row['relation'],
                'previous_school_name' => $row['previous_school_name'],
                'previous_class' => $row['previous_class'],
                'grade' => $row['grade'],
                'file' => $row['file'],
                'previous_school_address' => $row['previous_school_address'],
                'previous_school_phone' => $row['previous_school_phone'],
                'previous_school_email' => $row['previous_school_email'],
                'route_id' => $row['route'],
                'percentage' => $row['scholarship_percentage'],
                'reason' => $row['reason_for_scholarship'],
                'admission_id' => $row['admission_id'],
                'admission_date' => $row['admission_date'],
                'roll_no' => $roll,
                'house_id' => $row['house_id'],
//                'section_id' => $section_id,
                'section_id' => $row['section_id'],
                'classroom_id' => $row['classroom_id'],
            ]);
            $student->save();

            $studentSession = new StudentSession([
                'session_id' => get_academic_year(),
                'student_id' => $student->id,
                'classroom_id' => $row['classroom_id'],
                'section_id' => $section_id,
//                'section_id' => $row['section_id'],
                'roll' => $roll
            ]);
            $studentSession->save();
        }
    }

}
