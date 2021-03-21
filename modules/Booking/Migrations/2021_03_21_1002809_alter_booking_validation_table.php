<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  AlterBookingValidationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_bookings', function (Blueprint $table) {
            $table->tinyInteger('is_contract')->nullable();
            $table->string('contract_name', 255)->nullable();
            $table->timestamp('contract_date')->nullable();

            $table->tinyInteger('is_signature')->nullable();
            $table->string('signature_name', 255)->nullable();
            $table->timestamp('signature_date')->nullable();

            $table->tinyInteger('is_commission')->nullable();
            $table->timestamp('commission_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_bookings', function (Blueprint $table) {
            $table->dropColumn('is_contract');
            $table->dropColumn('contract_name');
            $table->dropColumn('contract_date');
            $table->dropColumn('is_signature');
            $table->dropColumn('signature_name');
            $table->dropColumn('signature_date');
            $table->dropColumn('is_commission');
            $table->dropColumn('commission_date');
        });
    }
}
