<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_tabs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->integer('package_id');
            $table->string('itinerary_title', 100);
            $table->text('tab_note');
            $table->text('special_note');
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
        Schema::dropIfExists('package_tabs');
    }
}
