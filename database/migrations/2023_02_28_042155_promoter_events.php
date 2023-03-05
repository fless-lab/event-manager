<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromoterEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoter_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->string('title');
            $table->string('description');
            $table->string('place');
            $table->string('cover')->nullable();
            $table->enum('status',["pending","validated","rejected"])->default("pending");
            $table->string('start_date');
            $table->string('end_date');
            $table->timestamps();
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
        Schema::dropIfExists('promoter_events');
    }
}
