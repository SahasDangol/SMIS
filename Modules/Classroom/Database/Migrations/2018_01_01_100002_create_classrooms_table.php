<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('class_name',30);
            $table->boolean('section_status')->default(0);
            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1)->unsigned();
            $table->foreign('post_by')->references('id')->on('users');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('classrooms');
    }
}
