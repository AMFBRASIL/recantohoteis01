<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoBookingPaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_booking_payment_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('booking_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('transaction_number')->nullable();
            $table->bigInteger('payment_type_rate_id')->nullable();
            $table->decimal('payment_value', 12, 2)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bravo_booking_payment_history');
    }
}
