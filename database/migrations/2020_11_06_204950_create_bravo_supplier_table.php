<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBravoSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->string('slug',255)->charset('utf8')->index();
            $table->string('contact', 255)->nullable();
            $table->tinyInteger('person_type')->nullable();
            $table->string('document', 20)->nullable();
            $table->string('state_registration', 50)->nullable();
            $table->string('city_registration', 50)->nullable();
            $table->string('taxpayer', 3)->nullable();
            $table->date('birthdate')->nullable();

            // Address
            $table->string('zipcode', 9)->nullable();
            $table->string('street_name', 255)->nullable();
            $table->integer('street_number')->nullable();
            $table->string('neighborhood', 255)->nullable();
            $table->string('complement', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 2)->nullable();

            // Contact
            $table->string('home_number', 15)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('contact_name', 255)->nullable();
            $table->string('contact_complement', 255)->nullable();
            $table->text('comments')->nullable();

            // Config
            $table->tinyInteger('is_simples')->nullable();
            $table->tinyInteger('is_rural')->nullable();
            $table->tinyInteger('is_shipping')->nullable();

            // Images
            $table->integer('image_id')->nullable();
            $table->integer('banner_image_id')->nullable();

            // Role configs
            $table->string('status',50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_supplier_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title', 255)->nullable();
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
        Schema::dropIfExists('bravo_suppliers');
        Schema::dropIfExists('bravo_supplier_translations');
    }
}
