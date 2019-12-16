<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();            
            $table->string('name');
            $table->string('email');
            $table->string('tel');
            $table->string('language');
            $table->string('position');
            $table->string('image');

            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('departments')->onDelete('cascade');  

            $table->unsignedBigInteger('pro_id');
            $table->foreign('pro_id')->references('id')->on('programs')->onDelete('cascade'); 
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');                   
            
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
        Schema::dropIfExists('staffs');
    }
}
