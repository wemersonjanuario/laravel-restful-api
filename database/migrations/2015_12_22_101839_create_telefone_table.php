<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefone', function (Blueprint $table) {
            $table->bigIncrements('telefone_id');
            $table->integer('telefone_funcionario_id')->nullable()->unsigned();
            $table->string('telefone_numero');
            $table->timestamp('telefone_created_at');
            $table->timestamp('telefone_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefone');
    }
}
