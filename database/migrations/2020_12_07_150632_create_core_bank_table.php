<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_bank', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ispb')->nullable();
            $table->string('nome_reduzido')->nullable();
            $table->string('numero_codigo')->nullable();
            $table->string('participa_da_compe')->nullable();
            $table->string('acesso_principal')->nullable();
            $table->string('nome_extenso')->nullable();
            $table->string('inicio_da_operação')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
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
        Schema::dropIfExists('core_bank');
    }
}
