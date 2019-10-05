<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_staff')->unsigned();
            $table->foreign('id_staff')->references('id')->on('users')->onDelete('cascade');
            $table->string('token');
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::table('staffs', function (Blueprint $table) {
            $table->boolean('is_activated')->default(1);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_activations');
    }
}
