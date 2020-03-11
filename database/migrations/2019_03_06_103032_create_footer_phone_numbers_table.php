<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterPhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_phone_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('package');
            $table->text('package_banani');
            $table->text('visa');
            $table->text('visa_banani');
            $table->text('air_ticket');
            $table->text('air_ticket_banani');
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
        Schema::dropIfExists('footer_phone_numbers');
    }
}
