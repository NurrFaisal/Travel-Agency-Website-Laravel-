<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('package_id');
            $table->string('places_covered', 40);
            $table->string('inclusions', 40);
            $table->string('exclusions', 40);
            $table->string('others', 40);
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
        Schema::dropIfExists('about_tours');
    }
}
