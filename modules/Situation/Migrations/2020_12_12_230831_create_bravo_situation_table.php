<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoSituationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_situation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('section_id')->nullable();
            $table->string('label')->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_section', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_situation_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('name')->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_section_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('name')->nullable();
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
        Schema::dropIfExists('bravo_situation');
        Schema::dropIfExists('bravo_section');
        Schema::dropIfExists('bravo_situation_translations');
        Schema::dropIfExists('bravo_section_translations');
    }
}
