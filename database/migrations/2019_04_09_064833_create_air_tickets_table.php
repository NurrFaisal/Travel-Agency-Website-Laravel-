<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->unsignedInteger('air_ticket_title_id');
            $table->unsignedInteger('destination');
            $table->unsignedInteger('air_line_id');
            $table->decimal('price');
            $table->string('ticket_class', 40);
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
        Schema::dropIfExists('air_tickets');
    }
}
