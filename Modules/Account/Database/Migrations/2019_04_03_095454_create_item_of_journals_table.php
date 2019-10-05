<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOfJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_of_journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('journal_id')->unsigned();
            $table->foreign('journal_id')->references('id')->on('journals');
            $table->integer('ledger_id')->unsigned();
            $table->foreign('ledger_id')->references('id')->on('list_of_ledgers');
            $table->decimal('debit',8,2);
            $table->decimal('credit',8,2);
            $table->string('cr_dr');
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
        Schema::dropIfExists('item_of_journals');
    }
}
