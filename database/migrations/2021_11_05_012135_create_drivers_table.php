<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('password')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('card_no')->unique();
            $table->string('company')->nullable();
            $table->string('license')->nullable();
            $table->string('userId')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default('Active');

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
        Schema::dropIfExists('drivers');
    }
}
