<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoFinancialCardMachineAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_financial_card_machine_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->bigInteger('bank_account_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->decimal('rate')->nullable();
            $table->integer('days')->nullable();
            $table->string('phone_support', 20)->nullable();
            $table->string('email_support', 50)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_financial_card_machine_account_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->bigInteger('bank_account_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->decimal('rate')->nullable();
            $table->integer('days')->nullable();
            $table->string('phone_support', 20)->nullable();
            $table->string('email_support', 50)->nullable();
            $table->string('locale')->index();
            $table->integer('origin_id')->unsigned();
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
        Schema::dropIfExists('bravo_financial_card_machine_accounts');

        Schema::dropIfExists('bravo_financial_card_machine_account_translations');
    }
}
