<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoTariffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_tariff', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('tariff_start')->nullable();
            $table->integer('tariff_end')->nullable();
            $table->decimal('percentage_tariff',8,2)->nullable();
            $table->string('guest_category')->nullable();
            $table->bigInteger('classification_id')->nullable();
            $table->bigInteger('characteristic_id')->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->string('is_monday',1)->nullable();
            $table->string('is_tuesday',1)->nullable();
            $table->string('is_wednesday',1)->nullable();
            $table->string('is_thursday',1)->nullable();
            $table->string('is_friday',1)->nullable();
            $table->string('is_saturday',1)->nullable();
            $table->string('is_sunday',1)->nullable();

;
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_tariff_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('name')->nullable();
            $table->integer('tariff_start')->nullable();
            $table->integer('tariff_end')->nullable();
            $table->decimal('percentage_tariff',8,2)->nullable();
            $table->string('guest_category')->nullable();
            $table->bigInteger('classification_id')->nullable();
            $table->bigInteger('characteristic_id')->nullable();
            $table->bigInteger('situation_id')->nullable();
            $table->string('is_monday',1)->nullable();
            $table->string('is_tuesday',1)->nullable();
            $table->string('is_wednesday',1)->nullable();
            $table->string('is_thursday',1)->nullable();
            $table->string('is_friday',1)->nullable();
            $table->string('is_saturday',1)->nullable();
            $table->string('is_sunday',1)->nullable();
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
        Schema::dropIfExists('bravo_tariff');
        Schema::dropIfExists('bravo_tariff_translations');
    }
}
