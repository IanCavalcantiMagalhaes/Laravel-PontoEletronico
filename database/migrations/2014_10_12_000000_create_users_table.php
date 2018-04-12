<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('CPF')->unique();
            $table->string('Endereço');
            $table->string('Endereço');
            $table->double('CargahorariaAtual',5,3);//limie de digitos,Limite de casas decimais
            $table->boolean('Devendo');
            $table->double('HorasDevendo');
            $table->boolean('Extra');
            $table->double('HorasExtra');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('Curso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomeCurso');
            $table->string('Turno');
            
        });
        Schema::create('Periodo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomePeriodo');
            $table->string('Curso_id')->references('id')->on('Curso');
            
        });
        Schema::create('Materia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->string('Periodo_id')->references('id')->on('Perido');
            
        });
        Schema::create('Aula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->string('Materia_id')->references('id')->on('Materia');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
