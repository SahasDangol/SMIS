<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopyOfInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copy_of_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('session_id')->unsigned();
            $table->string('date');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('previous_dues',8,2)->default(0.00);
            $table->decimal('total',8,2);
            $table->decimal('paid',8,2)->default(0.00);
            $table->decimal('discount',8,2)->default(0.00);
            $table->decimal('balance',8,2);
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('copy_of_invoices');
    }
}
