<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name',15);
            $table->tinyInteger('classroom_id')->unsigned();
            $table->tinyInteger('session_id')->unsigned();
            $table->integer('capacity');
            $table->integer('class_teacher_id')->nullable()->unsigned();
            $table->boolean('status')->default(1);
            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1)->unsigned();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->integer('hits')->nullable();
            $table->timestamps();
            $table->boolean('sync_status')->default(0);


            $table->foreign('classroom_id')->references('id')->on('classrooms') ->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('academics_years');
            $table->foreign('class_teacher_id')->references('id')->on('staffs')->onDelete('set null');;
            $table->foreign('post_by')->references('id')->on('users');
            $table->foreign('verified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
