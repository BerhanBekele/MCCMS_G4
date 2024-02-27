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

        // $table->id();
        // $table->integer('quantity');
        // $table->integer('price');
        // $table->unsignedBigInteger('order_id');
        // $table->foreign('order_id')->references('id')->on('orders');
        // $table->unsignedBigInteger('product_id');
        // $table->foreign('product_id')->references('id')->on('products');

        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_description');
            $table->string('case_type');
            $table->string('case_status')->default('pending');
            $table->string('email');
            $table->unsignedBigInteger('court_id')->default('0');
            // $table->foreign('court_id')->references('id')->on('court');
            $table->unsignedBigInteger('judge_id')->default('0');
            $table->unsignedBigInteger('lawyer_id')->default('0');
            // $table->foreign('judge_id')->references('id')->on('judge');
            $table->string('case_decision');
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
        Schema::dropIfExists('cases');
    }
};
