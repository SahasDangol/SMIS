<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('purpose',100);
            $table->string('date',10);
            $table->string('entry_time',10);
            $table->string('leave_time',10)->nullable();
            $table->string('visitor_card_no',4)->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('visitors');
    }
}
