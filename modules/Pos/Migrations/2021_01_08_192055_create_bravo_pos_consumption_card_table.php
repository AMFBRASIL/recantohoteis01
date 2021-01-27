<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoPosConsumptionCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_pos_consumption_card', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_number')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->decimal('value_card', 12, 2)->nullable();
            $table->decimal('value_consumed', 12, 2)->nullable();
            $table->decimal('value_add', 12, 2)->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('card_transaction_number')->nullable();
            $table->text('internal_observations')->nullable();
            $table->bigInteger('cost_center_id')->nullable();
            $table->bigInteger('bank_account_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->timestamp('date_closing')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_pos_consumption_card_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_number')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->decimal('value_card', 12, 2)->nullable();
            $table->decimal('value_consumed', 12, 2)->nullable();
            $table->decimal('value_add', 12, 2)->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('card_transaction_number')->nullable();
            $table->text('internal_observations')->nullable();
            $table->bigInteger('cost_center_id')->nullable();
            $table->bigInteger('bank_account_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->timestamp('date_closing')->nullable();
            $table->string('locale')->index();
            $table->integer('origin_id')->unsigned();
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
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
        Schema::dropIfExists('bravo_pos_consumption_card');

        Schema::dropIfExists('bravo_pos_consumption_card_translations');
    }
}
