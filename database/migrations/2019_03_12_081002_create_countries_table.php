<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('continent_id');
            $table->string('name', 20);
            $table->string('slug', 20);
            $table->string('capital', 20);
            $table->string('languages', 25);
            $table->string('area', 30);
            $table->string('population', 30);
            $table->string('currency', 30);
            $table->string('time_zone', 10);
            $table->string('calling_code', 10);
            $table->string('date_formate', 30);
            $table->string('independent', 50);
            $table->string('victory', 50);
            $table->string('religion', 80);
            $table->text('image');
            $table->text('banner_image');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('countries');
    }
}
