<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoBookingGuestsTable extends Migration
{
    /**
     * Run the migrations.
     * Rodei na branch feature/add-style-header-transparent-page
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_booking_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('booking_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bravo_booking_guests');
    }
}
