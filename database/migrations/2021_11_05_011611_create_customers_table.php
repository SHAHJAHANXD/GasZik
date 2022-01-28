<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('password')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('card_no')->nullable();
            $table->string('company')->nullable();
            $table->string('license')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
