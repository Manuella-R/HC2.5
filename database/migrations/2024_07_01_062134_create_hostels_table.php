<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id('H_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address');
            $table->text('description');
            $table->decimal('rent', 8, 2);
            $table->text('amenities')->nullable();
            $table->text('rules')->nullable();
            $table->boolean('availability')->default(true);
            $table->integer('number_beds');
            $table->integer('vacant_beds');
            $table->json('photos')->nullable();
            $table->timestamps();
            $table->boolean('constant_water_supply')->default(false);
            $table->boolean('private_security')->default(false);
            $table->boolean('parking_space')->default(false);
            $table->boolean('caretaker')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostels');
    }
}
