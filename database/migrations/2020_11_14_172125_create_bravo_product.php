<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Info
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->charset('utf8')->index();
            $table->string('product_code', 255)->nullable()->charset('utf8')->index();
            $table->string('product_barcode', 255)->nullable()->charset('utf8')->index();
            $table->text('content')->nullable();
            //Price
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('sale_price', 12, 2)->nullable();
            $table->decimal('unit_price', 12, 2)->nullable();
            // Weight
            $table->decimal('net_weight', 12, 2)->nullable();
            $table->decimal('gross_weight', 12, 2)->nullable();
            // Media
            $table->integer('image_id')->nullable();
            $table->string('gallery', 255)->nullable();
            $table->integer('banner_image_id')->nullable();
            // Composition
            $table->text('product_composition')->nullable();
            // Stock
            $table->integer('available_stock')->nullable();
            $table->integer('min_stock')->nullable();
            $table->integer('max_stock')->nullable();
            $table->bigInteger('stock_id')->nullable();
            // Unit/Category
            $table->bigInteger('product_unity_id')->nullable();
            $table->bigInteger('product_category_id')->nullable();
            $table->bigInteger('product_subcategory_id')->nullable();
            // Supplier
            $table->bigInteger('supplier_id')->nullable();
            // NCM / CEST
            $table->bigInteger('ncm_id')->nullable();
            $table->bigInteger('cest_id')->nullable();
            // CFOP
            $table->bigInteger('cfop_internal_id')->nullable();
            $table->bigInteger('cfop_external_id')->nullable();
            $table->string('origin_code', 3)->nullable();
            // CST
            $table->string('csosn_code', 10)->nullable();
            $table->decimal('csosn_value', 3, 2)->nullable();
            $table->bigInteger('cst_pis_id')->nullable();
            $table->decimal('cst_pis_value', 3, 2)->nullable();
            $table->bigInteger('cst_cofins_id')->nullable();
            $table->decimal('cst_cofins_value', 3, 2)->nullable();
            $table->bigInteger('cst_ipi_id')->nullable();
            $table->decimal('cst_ipi_value', 3, 2)->nullable();
            // Config
            $table->tinyInteger('control_stock')->nullable();
            $table->tinyInteger('enable_pos')->nullable();
            $table->tinyInteger('enable_nf')->nullable();
            $table->tinyInteger('show_in_menu')->nullable();
            $table->tinyInteger('use_balance')->nullable();
            $table->tinyInteger('loan_object')->nullable();
            $table->tinyInteger('input_product')->nullable();
            $table->tinyInteger('is_service')->nullable();
            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_product_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            //Info
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_product_unity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('acronym', 255)->nullable();
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_product_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_product_subcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id');
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_cst_pis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_cst_cofins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_cst_ipi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_ncm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
            $table->text('description')->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_cest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
            $table->string('description', 255)->nullable();
            // Role configs
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_cfop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 20)->nullable();
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
        Schema::dropIfExists('bravo_products');
        Schema::dropIfExists('bravo_product_translations');
        Schema::dropIfExists('bravo_product_unity');
        Schema::dropIfExists('bravo_product_category');
        Schema::dropIfExists('bravo_product_subcategory');
        Schema::dropIfExists('bravo_cst_pis');
        Schema::dropIfExists('bravo_cst_cofins');
        Schema::dropIfExists('bravo_cst_ipi');
        Schema::dropIfExists('bravo_ncm');
        Schema::dropIfExists('bravo_cest');
        Schema::dropIfExists('bravo_cfop');
    }
}
