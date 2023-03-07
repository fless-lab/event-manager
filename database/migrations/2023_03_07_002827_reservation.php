<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger("tarif_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("event_id");
            $table->timestamps();
            $table->foreign("tarif_id")->references("id")->on("tarifs")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("event_id")->references("id")->on("events")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
