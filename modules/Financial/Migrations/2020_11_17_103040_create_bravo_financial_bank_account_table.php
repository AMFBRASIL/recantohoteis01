<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoFinancialBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_financial_bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank', 255)->nullable();
            $table->string('agency', 255)->nullable();
            $table->string('account', 255)->nullable();
            $table->string('type_account', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_financial_bank_account_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank', 255)->nullable();
            $table->string('agency', 255)->nullable();
            $table->string('account', 255)->nullable();
            $table->string('type_account', 255)->nullable();
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
        Schema::dropIfExists('bravo_financial_bank_accounts');

        Schema::dropIfExists('bravo_financial_bank_account_translations');
    }
}
