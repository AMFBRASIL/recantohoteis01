<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotels', function (Blueprint $table) {
            $table->bigInteger('building_id')->nullable();
        });

        Schema::table('bravo_hotel_translations', function (Blueprint $table) {
            $table->bigInteger('building_id')->nullable();
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
            $table->dropColumn('building_id');
        });

        Schema::table('bravo_hotel_translations', function (Blueprint $table) {
            $table->bigInteger('building_id')->nullable();
        });
    }
}
