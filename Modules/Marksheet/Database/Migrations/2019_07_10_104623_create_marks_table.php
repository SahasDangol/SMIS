<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('academics_years');
            $table->integer('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exam_lists');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->tinyInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->tinyInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->tinyInteger('th_marks')->nullable();
            $table->tinyInteger('pr_marks')->nullable();
            $table->tinyInteger('marks')->nullable();
            $table->boolean('th_result')->nullable();
            $table->boolean('pr_result')->nullable();
            $table->boolean('result')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1)->unsigned();
            $table->foreign('post_by')->references('id')->on('users');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->foreign('verified_by')->references('id')->on('users');
            $table->integer('hits')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('marks');
    }
}
