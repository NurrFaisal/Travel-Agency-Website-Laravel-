<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewGelleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_gellery_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year_id' ,20);
            $table->integer('gellery_main_category_id');
            $table->string('sub_category_id', 100);
            $table->integer('person_id')->nullable();
            $table->text('box_image');
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
        Schema::dropIfExists('new_gellery_images');
    }
}
