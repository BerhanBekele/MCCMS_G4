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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('party_type');
            $table->string('party_name');
            $table->date('dob');
            $table->string('sex');
            $table->string('educ_level');
            $table->string('party_address');
            $table->string('phone_number');
            $table->unsignedBigInteger('case_id');
            $table->foreign('case_id')->references('id')->on('Cases');
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
        Schema::dropIfExists('parties');
    }
};
