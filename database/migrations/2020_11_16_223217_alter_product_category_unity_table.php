<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductCategoryUnityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_product_unity', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_product_unity', 'status')) {
                // Role configs
                $table->string('status',50)->nullable();
            }
        });

        Schema::table('bravo_product_category', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_product_category', 'enable_hide')) {
                $table->tinyInteger('enable_hide')->nullable();
            }

            if (!Schema::hasColumn('bravo_product_category', 'status')) {
                // Role configs
                $table->string('status',50)->nullable();
            }
        });

        Schema::create('bravo_product_category_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('bravo_product_subcategory', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_product_subcategory', 'class_icon')) {
                $table->string('class_icon', 255)->nullable();
            }

            if (!Schema::hasColumn('bravo_product_subcategory', 'image_id')) {
                $table->integer('image_id')->nullable();
            }

            if (!Schema::hasColumn('bravo_subproduct_category', 'status')) {
                // Role configs
                $table->string('status',50)->nullable();
            }
        });

        Schema::create('bravo_product_subcategory_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_product_unity_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('acronym', 255)->nullable();
            $table->string('description', 255)->nullable();
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
        Schema::dropIfExists('bravo_product_category_translations');
        Schema::dropIfExists('bravo_product_subcategory_translations');
        Schema::dropIfExists('bravo_product_unity_translations');
    }
}
