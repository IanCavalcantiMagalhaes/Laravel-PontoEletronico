<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
          
            
            $table->increments('id');
            $table->string('nome');
            $table->string('CPF');//->unique();
            $table->boolean('Trabalhando')->default(false);
            $table->string('CEP')->default("Vazio");
            $table->string('Telefone')->default("Vazio");
            $table->string('Cargo')->default("Vazio");
            $table->string('Endereço')->default("Vazio");
            $table->double('HorarioFeitoNaSemana',5,2)->default(0.00);//limie de digitos,Limite de casas decimais
            $table->double('HorarioQueDeviaSerFeito',5,2)->default(40.00);
            $table->boolean('Devendo')->default(false);
            $table->double('HorasDevendo')->default(0.00);
            $table->boolean('Extra')->default(false);
            $table->double('HorasExtra')->default(0.00);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('Funcionarios')->insert(
            array(
                'nome' => 'Ian',
                'CPF' => '111.111.111-11',
                'Cargo' => 'Tempo integral'
            )
        );
        DB::table('Funcionarios')->insert(
            array(
                'nome' => 'Jose',
                'CPF' => '222.222.222-22',
                'Cargo' => 'Tempo parcial'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Funcionarios');
    }
}
