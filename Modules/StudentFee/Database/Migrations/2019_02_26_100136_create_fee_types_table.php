<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_types', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->tinyInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('academics_years');
            $table->string('fee_code',20);
            $table->string('fee_title',50);
            $table->string('fee_type',50);
            $table->tinyInteger('classroom_id')->unsigned();
            $table->decimal('amount',8,2);
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('post_by')->default(1)->unsigned();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->integer('hits')->nullable();
            $table->timestamps();
            $table->boolean('sync_status')->default(0);
            $table->foreign('classroom_id')->references('id')->on('classrooms');
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
        Schema::dropIfExists('fee_types');
    }
}
