<?php

namespace Modules\Staff\Entities;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $table = 'staffs';

    protected $fillable = ['first_name','is_activated','user_id',
        'middle_name','last_name','dob','gender','temporary_address','permanent_address',
        'nationality','citizenship_no','citizenship_photo','personal_photo',
        'phone','mobile','email','marital_status','father_first_name','father_middle_name','father_last_name',
        'father_phone','father_mobile','father_occupation','mother_first_name','mother_middle_name','mother_last_name',
        'mother_phone','mother_mobile','mother_occupation','blood_group','comments','joining_date','staff_id',
        'designation_id','department_id','password','higher_education_degree','grade','institution','institution_address','institution_name',
        'address','work_duration','reason_to_leave','training_title','training_duration','training_institution_name',
        'last_name','remarks','hits'];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
    public function designations(){
        return $this->belongsTo('Modules\Others\Entities\Designation','designation_id');
    }
    public function departments(){
        return $this->belongsTo('Modules\Others\Entities\Department','department_id');
    }
    public function section(){
        return $this->hasOne('Modules\Classroom\Entities\Section','class_teacher_id');
    }
    public function subject_teachers(){
        return $this->hasMany('Modules\Subject\Entities\SubjectTeacher','teacher_id');
    }
}
