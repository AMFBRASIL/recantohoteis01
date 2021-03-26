<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBravoPensionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_pension_types', function (Blueprint $table) {
            $table->decimal('daily_rate_40', 12, 2)->nullable();
            $table->decimal('daily_rate_100', 12, 2)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_date')->nullable();
        });

        Schema::table('bravo_pension_type_translations', function (Blueprint $table) {
            $table->decimal('daily_rate_40', 12, 2)->nullable();
            $table->decimal('daily_rate_100', 12, 2)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_pos_sale', function (Blueprint $table) {
            $table->dropColumn('daily_rate_40');
            $table->dropColumn('daily_rate_100');
            $table->dropColumn('start_time');
            $table->dropColumn('end_date');
        });

        Schema::table('bravo_pos_sale_translations', function (Blueprint $table) {
            $table->dropColumn('daily_rate_40');
            $table->dropColumn('daily_rate_100');
            $table->dropColumn('start_time');
            $table->dropColumn('end_date');
        });
    }
}
