<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->nullable();
            $table->string('complain_type',50);
            $table->string('complain_by',100);
            $table->string('phone',30)->nullable();
            $table->string('email',100)->nullable();
            $table->string('date',100);
            $table->text('taken_action')->nullable();
            $table->text('note')->nullable();
            $table->string('attach_document')->nullable();
            $table->text('remarks')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('post_by')->default(1)->unsigned();
            $table->foreign('post_by')->references('id')->on('users');
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
        Schema::dropIfExists('complains');
    }
}
