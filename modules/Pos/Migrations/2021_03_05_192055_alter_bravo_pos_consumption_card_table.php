<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBravoPosConsumptionCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_pos_consumption_card', function (Blueprint $table) {
            $table->bigInteger('room_id');
            $table->tinyInteger('day_user')->nullable();
        });

        Schema::table('bravo_pos_consumption_card_translations', function (Blueprint $table) {
            $table->bigInteger('room_id');
            $table->tinyInteger('day_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_pos_consumption_card', function (Blueprint $table) {
                $table->dropColumn('room_id');
                $table->dropColumn('day_user');
        });

        Schema::table('bravo_pos_consumption_card_translations', function (Blueprint $table) {
                $table->dropColumn('room_id');
                $table->dropColumn('day_user');
        });
    }
}
