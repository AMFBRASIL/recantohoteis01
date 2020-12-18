<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_building', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_building_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('name', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_building_floor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id');
            $table->string('name', 255)->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_building_floor_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('name', 255)->nullable();
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
        Schema::dropIfExists('bravo_building');
        Schema::dropIfExists('bravo_building_floor');
        Schema::dropIfExists('bravo_building_translations');
        Schema::dropIfExists('bravo_building_floor_translations');
    }
}
