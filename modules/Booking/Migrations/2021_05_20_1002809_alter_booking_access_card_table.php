<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  AlterBookingAccessCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_bookings', function (Blueprint $table) {
            $table->string('access_card')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_bookings', function (Blueprint $table) {
            $table->dropColumn('access_card');
        });
    }
}
