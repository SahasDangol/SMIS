<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionalSubjectAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optional_subject_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->Integer('optional_subject1_id')->nullable()->unsigned();
            $table->foreign('optional_subject1_id')->references('id')->on('subjects')->onDelete('set null');
            $table->Integer('optional_subject2_id')->nullable()->unsigned();
            $table->foreign('optional_subject2_id')->references('id')->on('subjects')->onDelete('set null');
            $table->tinyInteger('session_id');
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
        Schema::dropIfExists('optional_subject_assigns');
    }
}
