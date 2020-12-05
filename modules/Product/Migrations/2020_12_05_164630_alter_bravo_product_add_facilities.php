<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBravoProductAddFacilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_products', function(Blueprint $table) {
            if (! Schema::hasColumn('bravo_products', 'facilities')) {
                $table->tinyInteger('facilities')->after('is_service')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_products', function(Blueprint $table) {
           if (Schema::hasColumn('bravo_products', 'facilities')) {
               $table->dropColumn('facilities');
           }
        });
    }
}
