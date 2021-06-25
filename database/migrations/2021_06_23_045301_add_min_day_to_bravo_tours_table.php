<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinDayToBravoToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_attrs', 'position')) {
                $table->smallInteger('position')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            //
        });
    }
}
