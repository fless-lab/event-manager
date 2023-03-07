<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->string('name');
            $table->integer('price');
            $table->string('num');
            $table->string('start_date');
            $table->string('end_date');
            $table->timestamps();
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
        Schema::dropIfExists('tarifs');
    }
}
