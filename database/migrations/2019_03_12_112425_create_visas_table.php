<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('continent_id');
            $table->string('country_name', 20);
            $table->decimal('price', 10,2);
            $table->text('short_description');
            $table->string('duration');
            $table->text('professional');
            $table->text('business');
            $table->text('spouse');
            $table->text('student');
            $table->text('embassy');
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
        Schema::dropIfExists('visas');
    }
}
