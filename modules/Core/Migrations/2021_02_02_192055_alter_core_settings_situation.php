<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCoreSettingSituation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_settings', function (Blueprint $table) {
            $table->bigInteger('situation_hotel_id')->nullable();
            $table->bigInteger('situation_space_id')->nullable();
            $table->bigInteger('situation_tour_id')->nullable();
            $table->bigInteger('situation_event_id')->nullable();
            $table->bigInteger('situation_car_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_settings', function (Blueprint $table) {
            $table->dropColumn('situation_hotel_id')->nullable();
            $table->dropColumn('situation_space_id')->nullable();
            $table->dropColumn('situation_tour_id')->nullable();
            $table->dropColumn('situation_event_id')->nullable();
            $table->dropColumn('situation_car_id')->nullable();
        });
    }
}
