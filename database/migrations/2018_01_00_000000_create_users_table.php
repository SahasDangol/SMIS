<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(0);
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->string('user_type', 20)->default('user');
            $table->tinyInteger('status')->default(1);
            $table->string('facebook', 64)->nullable();
            $table->string('twitter', 64)->nullable();
            $table->string('linkedin', 64)->nullable();
            $table->string('google_plus', 64)->nullable();

            $table->text('remarks')->nullable();
            $table->integer('post_by')->default(1);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->integer('verified_by')->nullable();
            $table->integer('hits')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
