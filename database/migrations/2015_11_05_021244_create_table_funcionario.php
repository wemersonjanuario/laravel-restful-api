<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->bigIncrements('funcionario_id');
            $table->string('funcionario_nome');
            $table->string('funcionario_departamento')->nullable();
            $table->string('funcionario_usuario')->nullable();
            $table->integer('funcionario_idade')->nullable();
            $table->decimal('funcionario_salario')->nullable();
            $table->boolean('funcionario_ativo');
            $table->date('funcionario_nascimento')->nullable();
            $table->timestamp('funcionario_created_at');
            $table->timestamp('funcionario_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
