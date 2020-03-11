<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('division_id')->nullable();
            $table->string('code', 20);
            $table->string('name', 100);
            $table->string('location', 100);
            $table->string('duration', 80);
            $table->decimal('price');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('includes');
            $table->text('excludes');
            $table->string('fixed_date', 80);
            $table->string('destination_location', 80);
            $table->text('tour_details');
            $table->text('important_note');
            $table->text('terms_and_condition');
            $table->text('box_image');
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
        Schema::dropIfExists('packages');
    }
}
