<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            //Guardian Details
            $table->string('guardian_first_name', 30);
            $table->string('guardian_middle_name', 30)->nullable();
            $table->string('guardian_last_name', 30);
            $table->string('guardian_email',50)->nullable();
            $table->string('guardian_phone',15)->nullable();
            $table->string('guardian_mobile',15);
            $table->string('guardian_temporary_address',100)->nullable();
            $table->string('guardian_permanent_address',100);
            $table->string('guardian_occupation', 25)->nullable();

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
        Schema::dropIfExists('guardians');
    }
}
