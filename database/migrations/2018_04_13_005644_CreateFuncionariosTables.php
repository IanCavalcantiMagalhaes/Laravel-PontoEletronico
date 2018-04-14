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
        Schema::create('Funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('CPF')->default("Vazio");//->unique();
            $table->string('Endereço')->default("Vazio");
            $table->double('CargahorariaAtual',5,3)->default(0.00);//limie de digitos,Limite de casas decimais
            $table->boolean('Devendo')->default(false);
            $table->double('HorasDevendo')->default(0.00);
            $table->boolean('Extra')->default(false);
            $table->double('HorasExtra')->default(0.00);
            $table->rememberToken();
            $table->timestamps();
        });
         DB::table('Funcionarios')->insert(
            array(
                'nome' => 'Ian'
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
