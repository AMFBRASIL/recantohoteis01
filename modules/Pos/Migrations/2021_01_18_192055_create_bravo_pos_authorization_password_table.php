<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoPosAuthorizationPasswordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_pos_authorization_password', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password',20)->nullable();
            $table->bigInteger('situation_id')->nullable();;
            $table->timestamp('expiration_date')->nullable();
            $table->text('internal_observations')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_pos_authorization_password_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password',20)->nullable();
            $table->bigInteger('situation_id')->nullable();;
            $table->timestamp('expiration_date')->nullable();
            $table->text('internal_observations')->nullable();
            $table->string('locale')->index();
            $table->integer('origin_id')->unsigned();
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
        Schema::dropIfExists('bravo_pos_authorization_password');

        Schema::dropIfExists('bravo_pos_authorization_password_translations');
    }
}
