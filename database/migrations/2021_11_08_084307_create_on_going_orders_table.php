<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnGoingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_going_orders', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default("Pending");  /// Requested, Rejected, Assigned,  Delivered,
            $table->string('paidstatus')->default('True');
            $table->string('userId')->nullable();
            $table->string('statusAr')->nullable();
            $table->string('orderType')->nullable();
            $table->string('orderTypeAr')->nullable();
            $table->string('totalAmount')->nullable();
            $table->string('discount')->nullable();
            $table->string('serviceCharges')->nullable();
            $table->string('deliveryCharges')->nullable();
            $table->string('tax')->nullable();
            $table->string('netAmount')->nullable();
            $table->string('assignedTime')->nullable();
            $table->string('dispatchedTime')->nullable();
            $table->string('deliveryTime')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('paymentTypeAr')->nullable();
            $table->string('orderAddress')->nullable();
            $table->string('orderAddressAr')->nullable();
            $table->string('orderLatitude')->nullable();
            $table->string('orderLongitude')->nullable();
            $table->string('building')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('landMark')->nullable();
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
        Schema::dropIfExists('on_going_orders');
    }
}
