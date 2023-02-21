<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("promoter_id");
            $table->unsignedBigInteger("category_id");
            $table->string('title');
            $table->string('description');
            $table->string('place');
            $table->enum('status',["pending","validated","rejected"])->default("pending");
            $table->string('cover')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->timestamps();
            $table->foreign("promoter_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("event_categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
