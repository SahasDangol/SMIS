<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_name',40);
            $table->string('subject_code',20);
            $table->string('subject_type',15);
            $table->tinyInteger('classroom_id')->unsigned();
            $table->string('credit_hour',1);
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->tinyInteger('full_mark');
            $table->tinyInteger('pass_mark');
            $table->tinyInteger('th_full_mark');
            $table->tinyInteger('pr_full_mark')->nullable();
            $table->tinyInteger('th_pass_mark');
            $table->tinyInteger('pr_pass_mark')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
