<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHotelTableFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotels', function (Blueprint $table) {
            $table->bigInteger('floor_id')->nullable();
        });

        Schema::table('bravo_hotel_translations', function (Blueprint $table) {
            $table->bigInteger('floor_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_hotels', function (Blueprint $table) {
            $table->dropColumn('floor_id');
        });

        Schema::table('bravo_hotel_translations', function (Blueprint $table) {
            $table->bigInteger('floor_id')->nullable();
        });
    }
}
