<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBravoBookingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     * Rodei na Branch feature/add-style-header-transparent-page
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_booking_payments', function (Blueprint $table) {
            $table->string('payment_type')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 12, 2)->nullable();
            $table->decimal('cash_value', 12, 2)->nullable();
            $table->string('deposit_bank')->nullable();
            $table->timestamp("dt_deposit_payment")->nullable();
            $table->decimal('deposit_value', 12, 2)->nullable();
            $table->bigInteger("card_machine_id")->nullable();
            $table->timestamp("dt_card_payment")->nullable();
            $table->decimal('card_value', 12, 2)->nullable();
            $table->string('nsu_card')->nullable();
            $table->string('authentication_card')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_booking_payments', function (Blueprint $table) {

           $table->dropColumn('payment_type');
           $table->dropColumn('discount');
           $table->dropColumn('discount_type');
           $table->dropColumn('discount_value', 12, 2);
           $table->dropColumn('cash_value', 12, 2);
           $table->dropColumn('deposit_bank');
           $table->dropColumn("dt_deposit_payment");
           $table->dropColumn('deposit_value', 12, 2);
           $table->dropColumn("card_machine_id");
           $table->dropColumn("dt_card_payment");
           $table->dropColumn('card_value', 12, 2);
           $table->dropColumn('nsu_card');
           $table->dropColumn('authentication_card');
        });
    }
}
