<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('Review_id');
            $table->unsignedBigInteger('R_id');
            $table->unsignedBigInteger('H_id');
            $table->foreign('R_id')->references('R_id')->on('residents')->onDelete('cascade');
            $table->foreign('H_id')->references('H_id')->on('hostels')->onDelete('cascade');
            $table->text('review');
            $table->boolean('flagged')->default(false);
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
        Schema::dropIfExists('reviews');
    }
}
