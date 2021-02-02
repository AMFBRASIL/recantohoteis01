<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHotelRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
            $table->bigInteger('room_id')->nullable();
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->bigInteger('room_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
            $table->dropColumn('room_id');
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->bigInteger('room_id')->nullable();
        });
    }
}
