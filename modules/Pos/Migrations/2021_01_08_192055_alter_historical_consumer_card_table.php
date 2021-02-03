<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHistoricalConsumerCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_pos_historical_consumer_card', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable();
        });

        Schema::table('bravo_pos_historical_consumer_card_translations', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bravo_pos_historical_consumer_card');

        Schema::dropIfExists('bravo_pos_historical_consumer_card_translations');
    }
}
