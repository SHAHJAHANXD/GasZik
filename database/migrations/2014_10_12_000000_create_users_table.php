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
            $table->string('Name')->nullable();
            $table->string('NameAr')->nullable();
            $table->string('Email')->unique();
            $table->string('password');
            $table->string('Image')->nullable();
            $table->string('Address')->nullable();
            $table->string('AddressAr')->nullable();
            $table->string('Latlong')->nullable();
            $table->string('user_id')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
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
