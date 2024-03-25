<?php
// database/migrations/YYYY_MM_DD_create_user_itinerary_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserItineraryTable extends Migration
{
    public function up()
    {
        Schema::create('user_itinerary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('itinerary_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_itinerary');
    }
}
