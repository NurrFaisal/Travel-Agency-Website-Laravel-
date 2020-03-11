<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabItineraryTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_itinerary_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tab_id');
            $table->string('title', 100);
            $table->text('description');
            $table->string('price', 40);
            $table->integer('package_id');
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
        Schema::dropIfExists('tab_itinerary_titles');
    }
}
