<?php

namespace App\Exports;


use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Marksheet\Entities\Mark;

use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Student\Entities\Student;
use Modules\Subject\Entities\Subject;
use function PHPSTORM_META\map;

class BulkMarksExport implements  WithHeadings
{
    protected $classroom_id, $section_id, $exam_id;

    function __construct($classroom_id, $section_id, $exam_id)
    {
        $this->classroom_id = $classroom_id;
        $this->section_id = $section_id;
        $this->exam_id = $exam_id;

    }

    /**
     * @return \Illuminate\Support\Collection
     */
//    public function Collection()
//    {
//
//
//        $export_marks = Student::where('section_id', $this->section_id)
//            ->get();
////        $export_marks=array(Student::with('marks')->where('section_id',$this->section_id)
////            ->select('id',DB::raw("CONCAT(first_name,' ',last_name) as name"),'roll_no'
////
////            )->get());
////        dd($export_marks);
////        dd($export_marks);
////dd($export_marks->marks);
//        foreach ($export_marks as $export_mark) {
//            $student_data = array($export_mark->id, $export_mark->first_name . ' ' . $export_mark->last_name, $export_mark->roll_no);
//            foreach ($export_mark->marks as $mark) {
//                array_push($student_data, $mark->th_marks, $mark->pr_marks);
//            }
//        }
//
////        $u=$p->toArray();
//        $p = collect($student_data);
//        dd($p);
//
//        return $p;
//    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // TODO: Implement headings() method.


        $class = Classroom::where('id', $this->classroom_id)->first();


        $head = array('id', 'name', 'roll_no');


        foreach ($class->subjects as $subject) {
            array_push($head, $subject->subject_name . ' (Theory)');
            if ($subject->pr_full_mark) {
                array_push($head, $subject->subject_name . ' (Practical)');
            }
        }


        return $head;


    }

}
