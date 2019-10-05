<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('fiscal_year_id')->unsigned();
            $table->foreign('fiscal_year_id')->references('id')->on('fiscal_years');
            $table->string('date',10);
            $table->text('narration')->nullable();
            $table->decimal('total_debit',8,2);
            $table->decimal('total_credit',8,2);
            $table->string('remarks')->nullable();
            $table->boolean('reconciliation')->default(0);
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
        Schema::dropIfExists('journals');
    }
}
