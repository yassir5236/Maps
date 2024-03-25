<?php

// database/migrations/YYYY_MM_DD_create_destinations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('lieuLogement');
            $table->unsignedBigInteger('itinerary_id');
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}

