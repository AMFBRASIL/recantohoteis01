<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockAdjustmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_stock_adjustment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('movement_type')->nullable();
            $table->decimal('shipping_price', 12, 2)->nullable();
            $table->text('product_composition')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('send_section_mail')->nullable();
            $table->tinyInteger('send_supplier_mail')->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_stock_adjustment_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->text('content')->nullable();
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
        Schema::dropIfExists('bravo_stock_adjustment');
        Schema::dropIfExists('bravo_stock_adjustment_translations');
    }
}
