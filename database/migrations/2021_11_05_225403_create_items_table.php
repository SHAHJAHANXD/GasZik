<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(1);
            $table->string('name')->nullable();
            $table->string('nameAr')->nullable();
            $table->string('description')->nullable();
            $table->string('descriptionAr')->nullable();
            $table->string('itemtype')->nullable();
            $table->string('itemtypeAr')->nullable();
            $table->string('unitprice')->nullable();
            $table->string('image')->nullable();
            $table->string('action')->nullable();
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
        Schema::dropIfExists('items');
    }
}
