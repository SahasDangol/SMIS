<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTypeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_type_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fee_type_id')->unsigned();
            $table->foreign('fee_type_id')->references('id')->on('fee_types');
            $table->tinyInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('academics_years');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('fee_type_status');
    }
}
