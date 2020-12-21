<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type',50)->nullable();;
            $table->string('cpf_cnpj',20)->nullable();
            $table->string('rg',20)->nullable();
            $table->string('passport',20)->nullable();
            $table->string('phone2',30)->nullable();
            $table->string('phone_whatsApp',30)->nullable();

            $table->string('business_website',255)->nullable();
            $table->integer('profession_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('vehicle_model',100)->nullable();
            $table->string('vehicle_cor',50)->nullable();
            $table->string('vehicle_plate',50)->nullable();
            $table->double('differentiated_discount')->nullable();
            $table->double('fixed_overnight_rate')->nullable();
            $table->integer('billing_day')->nullable();
            $table->integer('number_days_bill')->nullable();
            $table->double('billing_limit')->nullable();
            $table->string('hours_of',10)->nullable();
            $table->string('hours_until',10)->nullable();
            $table->string('day_or_night',50)->nullable();
            $table->integer('bank_id')->nullable();

            $table->tinyInteger('is_pos')->nullable();
            $table->tinyInteger('is_iss')->nullable();
            $table->tinyInteger('is_smoker')->nullable();
            $table->tinyInteger('is_suspect')->nullable();
            $table->tinyInteger('is_nfe')->nullable();
            $table->tinyInteger('is_nfce')->nullable();
            $table->tinyInteger('is_sat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
