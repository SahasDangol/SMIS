<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->tinyInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('academics_years');
            $table->string('date');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('total',8,2);
            $table->decimal('paid',8,2)->default(0.00);
            $table->decimal('discount',8,2)->default(0.00);
            $table->decimal('previous_dues',8,2)->default(0.00);
            $table->decimal('balance',8,2);
            $table->decimal('static_previous_dues',8,2)->default(0.00);
            $table->integer('previous_invoice_id')->nullable()->unsigned();
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('post_by')->default(1)->unsigned();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->integer('hits')->nullable();
            $table->timestamps();
            $table->boolean('sync_status')->default(0);



            $table->foreign('previous_invoice_id')->references('id')->on('invoices')->onDelete('set null');
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
        Schema::dropIfExists('invoices');
    }
}
