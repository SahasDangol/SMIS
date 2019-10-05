<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('fee_type_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->decimal('total',8,2);
            $table->decimal('paid',8,2)->nullable();
            $table->decimal('scholarship',8,2)->nullable();
            $table->decimal('balance',8,2)->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('post_by')->default(1)->unsigned();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->default(1)->unsigned();
            $table->integer('hits')->nullable();
            $table->timestamps();
            $table->boolean('sync_status')->default(0);

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('fee_type_id')->references('id')->on('fee_types')->onDelete('set null');
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
        Schema::dropIfExists('invoice_items');
    }
}
