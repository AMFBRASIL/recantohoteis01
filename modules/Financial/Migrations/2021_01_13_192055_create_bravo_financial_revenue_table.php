<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoFinancialRevenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_financial_revenue', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_account_id')->nullable();
            $table->bigInteger('cost_center_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('fine_value',20)->nullable();
            $table->string('interest_value',20)->nullable();
            $table->string('total_value',20)->nullable();
            $table->text('historical')->nullable();
            $table->timestamp('issue_date')->nullable();
            $table->timestamp('competency_date')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_financial_revenue_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_account_id')->nullable();
            $table->bigInteger('cost_center_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('fine_value',20)->nullable();
            $table->string('interest_value',20)->nullable();
            $table->string('total_value',20)->nullable();
            $table->text('historical')->nullable();
            $table->timestamp('issue_date')->nullable();
            $table->timestamp('competency_date')->nullable();
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
        Schema::dropIfExists('bravo_financial_revenue');

        Schema::dropIfExists('bravo_financial_revenue_translations');
    }
}
