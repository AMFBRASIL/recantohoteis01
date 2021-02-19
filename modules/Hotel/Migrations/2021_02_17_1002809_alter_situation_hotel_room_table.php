<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSituationHotelRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
            $table->bigInteger('situation_id')->nullable();
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->bigInteger('situation_id')->nullable();
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
            $table->dropColumn('situation_id');
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->dropColumn('situation_id')->nullable();
        });
    }
}
