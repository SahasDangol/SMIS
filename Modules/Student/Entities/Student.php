<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
//    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'first_name', 'middle_name','dob','gender','temporary_address','permanent_address','section_id','classroom_id',
        'nationality','religion','personal_photo',
        'guardian_id', 'relation',
        'blood_group','comments','height','weight',
        'previous_school_name', 'previous_school_address', 'grade','file','previous_class','previous_school_phone','previous_school_email',
        'route_id','admission_date','admission_id',
        'roll_no','house_id',
        'password','percentage','reason',
        'last_name','remarks','hits'];

    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function sections()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Section','section_id');
    }
    public function route()
    {
        return $this->belongsTo('Modules\Transport\Entities\TransportRoute','route_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function marks()
    {
        return $this->hasMany('Modules\Marksheet\Entities\Mark');
    }
    public function invoices()
    {
        return $this->hasMany('Modules\StudentFee\Entities\Invoice');
    }
    public function student_sessions()
    {
        return $this->hasMany('Modules\Student\Entities\StudentSession');
    }
    public function  payment_history(){
        return $this-> hasMany('Modules\StudentFee\Entities\PaymentHistory','student_id');
    }
    public function scholarships()
    {
        return $this->hasMany('Modules\Student\Entities\ScholarshipItem');
    }
    public function optional_subjects()
    {
        return $this->hasOne('Modules\Subject\Entities\OptionalSubjectAssign','student_id');
    }
    public function guardians()
    {
        return $this->belongsTo('Modules\Student\Entities\Guardian','guardian_id');
    }


}
