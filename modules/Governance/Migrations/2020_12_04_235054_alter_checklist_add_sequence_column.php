<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterChecklistAddSequenceColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_cleaning_checklist', function (Blueprint $table) {
            if (!Schema::hasColumn('sequence', 'bravo_cleaning_checklist')) {
                $table->string('sequence', 50)->nullable();
            }

            if (!Schema::hasColumn('checklist_type_id', 'bravo_cleaning_checklist')) {
                $table->bigInteger('checklist_type_id')->nullable();
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
        Schema::table('bravo_cleaning_checklist', function (Blueprint $table) {
            if (Schema::hasColumn('sequence', 'bravo_cleaning_checklist')) {
                $table->dropColumn('sequence');
            }

            if (Schema::hasColumn('checklist_type_id', 'bravo_cleaning_checklist')) {
                $table->dropColumn('checklist_type_id');
            }
        });
    }
}
