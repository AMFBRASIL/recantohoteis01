<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_budget', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('supplier_composition')->nullable();
            $table->text('product_composition')->nullable();
            $table->text('supplier_content')->nullable();
            $table->text('internal_content')->nullable();
            $table->string('budget_status', 50)->default('open');
            $table->tinyInteger('send_adm_mail')->nullable();
            $table->tinyInteger('send_stock_mail')->nullable();
            $table->tinyInteger('send_suppliers_mail')->nullable();
            $table->tinyInteger('send_manager_mail')->nullable();
            $table->tinyInteger('is_purchase')->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_budget_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->text('supplier_content')->nullable();
            $table->text('internal_content')->nullable();
            // Role configs
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
        Schema::dropIfExists('bravo_budget');
        Schema::dropIfExists('bravo_budget_translations');
    }
}
