<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('addressAr')->nullable();
            $table->string('addressType')->nullable();
            $table->string('addressTypeAr')->nullable();
            $table->string('latlong')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('building')->nullable();
            $table->string('landMark')->nullable();
            $table->string('lan')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('user_addresses');
    }
}
