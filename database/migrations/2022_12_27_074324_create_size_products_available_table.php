<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_products_available', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->integer('s')->nullable();
            $table->integer('m')->nullable();
            $table->integer('l')->nullable();
            $table->integer('xl')->nullable();
            $table->integer('xxl')->nullable();
            $table->integer('allsize')->nullable();
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
        Schema::dropIfExists('size_products_available');
    }
};
