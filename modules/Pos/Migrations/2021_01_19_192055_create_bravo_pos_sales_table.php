<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoPosSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_pos_sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_number')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('apartment_id')->nullable();
            $table->timestamp('sales_date')->nullable();
            $table->string('point_sales_id',20)->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('card_transaction_number')->nullable();
            $table->decimal('discounts_value', 12, 2)->nullable();
            $table->decimal('received_value', 12, 2)->nullable();
            $table->decimal('returned_value', 12, 2)->nullable();
            $table->decimal('total_value', 12, 2)->nullable();
            $table->text('internal_observations')->nullable();

            //Product
            $table->text('product_composition')->nullable();

            // Config
            $table->tinyInteger('is_control_inventory')->nullable();
            $table->tinyInteger('is_send_email_detail')->nullable();
            $table->tinyInteger('is_issue_note')->nullable();

            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_pos_sale_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_number')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('apartment_id')->nullable();
            $table->timestamp('sales_date')->nullable();
            $table->string('point_sales_id',20)->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->string('card_transaction_number')->nullable();
            $table->decimal('discounts_value', 12, 2)->nullable();
            $table->decimal('received_value', 12, 2)->nullable();
            $table->decimal('returned_value', 12, 2)->nullable();
            $table->decimal('total_value', 12, 2)->nullable();
            $table->text('internal_observations')->nullable();
            $table->string('locale')->index();
            $table->integer('origin_id')->unsigned();

            //Product
            $table->text('product_composition')->nullable();

            // Config
            $table->tinyInteger('is_control_inventory')->nullable();
            $table->tinyInteger('is_send_email_detail')->nullable();
            $table->tinyInteger('is_issue_note')->nullable();

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
        Schema::dropIfExists('bravo_pos_sale');

        Schema::dropIfExists('bravo_pos_sale_translations');
    }
}
