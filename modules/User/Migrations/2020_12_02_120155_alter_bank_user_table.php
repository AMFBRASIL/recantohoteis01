<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBankUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'bank_id')) {
                $table->dropColumn('bank_id');
            }
            if (!Schema::hasColumn('users', 'bank')) {
                $table->string('bank',100)->nullable();
            }
            if (!Schema::hasColumn('users', 'agency')) {
                $table->string('agency',100)->nullable();
            }
            if (!Schema::hasColumn('users', 'account')) {
                $table->string('account',100)->nullable();
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
    }
}
