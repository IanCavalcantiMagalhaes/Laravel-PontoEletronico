<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_materia');
            $table->integer('periodo_id')->references('id')->on('periodos');
            $table->timestamps();
        });
        DB::table('materias')->insert(
            array(
                'nome_materia' => 'Materia 1 S.I.',
                'periodo_id' => '4'
            )
        );
        DB::table('materias')->insert(
            array(
                'nome_materia' => 'Materia 2 S.I.',
                'periodo_id' => '5'
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
       // Schema::dropIfExists('materias');
    }
}
