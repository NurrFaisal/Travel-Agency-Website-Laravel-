<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirTicketMainDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_ticket_main_destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('up_name', 60);
            $table->string('up_time', 20);
            $table->string('down_name', 60);
            $table->string('down_time', 20);
            $table->unsignedInteger('air_ticket_id');
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
        Schema::dropIfExists('air_ticket_main_destinations');
    }
}
