<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmosAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmos_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('admin');
            $table->string('name', 60);
            $table->string('email', 60);
            $table->string('phone_number', 20);
            $table->text('password');
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
        Schema::dropIfExists('cosmos_admins');
    }
}
