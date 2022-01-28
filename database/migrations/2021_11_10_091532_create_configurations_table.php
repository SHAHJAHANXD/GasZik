<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('ServiceCharges')->nullable();
            $table->string('DeliveryCharges')->nullable();
            $table->string('Tax')->nullable();
            $table->string('MinimumRadius')->nullable();
            $table->string('MaximumRadius')->nullable();
            $table->string('MinimumOrder')->nullable();
            $table->string('DeliveryTime')->nullable();
            $table->string('SupportContact')->nullable();
            $table->string('SupportEmail')->nullable();
            $table->string('DeliveryTimeIncreasePerOrder')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
