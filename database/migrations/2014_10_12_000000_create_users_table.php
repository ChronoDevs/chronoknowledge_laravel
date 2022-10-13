<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('username', 50);
            $table->string('password', 60);
            $table->string('name', 60);
            $table->string('nick_name', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('zip_code', 8);
            $table->string('address', 100);
            $table->string('tel', 11);
            $table->rememberToken()->nullable();
            $table->date('email_verified_at')->nullable();
            $table->timestamps();
            $table->date('deleted_at')->nullable();
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
