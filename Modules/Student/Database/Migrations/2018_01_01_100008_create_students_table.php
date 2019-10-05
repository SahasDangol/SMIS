<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            //Personal Details
            $table->string('first_name', 30);
            $table->string('middle_name', 30)->nullable();
            $table->string('last_name', 30);

            $table->string('dob');
            $table->string('gender', 10);
            $table->string('temporary_address', 100)->nullable();
            $table->string('permanent_address', 100);
            $table->string('nationality', 15);

            $table->string('religion', 15);
            $table->string('personal_photo', 100)->nullable();


            //Health
            $table->string('blood_group', 10);
            $table->text('comments')->nullable();
            $table->string('height', 25)->nullable();
            $table->string('weight', 25)->nullable();

            //Guardian Information
            $table->integer('guardian_id');
            $table->string('relation');

            //Academic Information
            $table->string('previous_school_name',50)->nullable();
            $table->string('previous_class',15)->nullable();
            $table->string('grade',20)->nullable();
            $table->string('file',100)->nullable();
            $table->string('previous_school_address',50)->nullable();
            $table->string('previous_school_phone',15)->nullable();
            $table->string('previous_school_email',50)->nullable();

            //Transportation Detail
            $table->integer('route_id')->nullable()->unsigned();
            $table->foreign('route_id')->references('id')->on('transport_routes')->onDelete('set null');



            //Scholarship Detail
//            $table->string('scholarship_id')->nullable();
            $table->string('scholarship_type',25)->nullable();
            $table->string('percentage',20)->nullable();

            $table->string('reason')->nullable();
//            $table->string('siblings', 20)->nullable();


            //Official Detail
            $table->string('admission_id',10)->nullable();
            $table->string('admission_date',10)->nullable();
            $table->string('roll_no',20)->unique()->nullable();
            $table->string('house_id',20)->nullable();
            $table->tinyInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->tinyInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');


            $table->boolean('status')->default(1);
            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1)->unsigned();
            $table->foreign('post_by')->references('id')->on('users');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->foreign('verified_by')->references('id')->on('users');
            $table->integer('hits')->nullable();

            $table->timestamps();
            $table->boolean('sync_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
