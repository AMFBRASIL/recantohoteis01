<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClassificationHotelRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
            $table->bigInteger('classification_id')->nullable();
            $table->bigInteger('characteristic_id')->nullable();
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->bigInteger('classification_id')->nullable();
            $table->bigInteger('characteristic_id')->nullable();
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
            $table->dropColumn('classification_id');
            $table->dropColumn('characteristic_id');
        });

        Schema::table('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->dropColumn('classification_id')->nullable();
            $table->dropColumn('characteristic_id')->nullable();
        });
    }
}
