<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            //Personal Details
            $table->string('first_name', 30);
            $table->string('middle_name', 30)->nullable();
            $table->string('last_name', 30);
            $table->string('dob');
            $table->string('gender', 10);
            $table->string('temporary_address', 100)->nullable();
            $table->string('permanent_address', 100);
            $table->string('nationality', 15);
            $table->string('citizenship_no', 50);
            $table->string('citizenship_photo', 100)->nullable();
            $table->string('personal_photo', 100)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('mobile',15);
            $table->string('email', 50);
            $table->string('marital_status', 20);

            //Parent Details
            //Father Details
            $table->string('father_first_name', 30);
            $table->string('father_middle_name', 30)->nullable();
            $table->string('father_last_name', 30);
            $table->string('father_phone',15)->nullable();
            $table->string('father_mobile',15);
            $table->string('father_occupation', 25)->nullable();


            //Mother Details
            $table->string('mother_first_name', 30);
            $table->string('mother_middle_name', 30)->nullable();
            $table->string('mother_last_name', 30);
            $table->string('mother_phone',15)->nullable();
            $table->string('mother_mobile',15)->nullable();
            $table->string('mother_occupation', 25)->nullable();


            //Health
            $table->string('blood_group', 10);
            $table->text('comments')->nullable();

            //Official
            $table->string('joining_date', 15)->nullable();
            $table->string('staff_id', 10)->unique();
            $table->tinyInteger('designation_id')->unsigned();
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->tinyInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            //Qualification
            $table->string('higher_education_degree',50);
            $table->string('grade', 20);
            $table->string('institution', 50);
            $table->string('institution_address', 100);


            //Work Experience
            $table->string('institution_name', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('work_duration', 15)->nullable();
            $table->string('reason_to_leave')->nullable();

            //Training
            $table->string('training_title', 50)->nullable();
            $table->string('training_duration', 15)->nullable();
            $table->string('training_institution_name', 50)->nullable();

            $table->tinyInteger('status')->default(1);
            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1)->unsigned();
            $table->foreign('post_by')->references('id')->on('users');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->foreign('verified_by')->references('id')->on('users');
            $table->integer('hits')->nullable();

            $table->timestamps(); $table->boolean('sync_status')->default(0);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
