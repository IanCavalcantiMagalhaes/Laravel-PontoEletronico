<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomePeriodo');
            $table->string('Curso_id')->references('id')->on('Curso');
            
        });    
       // INSERT INTO periodos(NomePeriodo,Curso_id) VALUES ('1ºPeriodo de Direito',1),('2ºPeriodo de Direito',1),('3ºPeriodo de Direito',1),('4ºPeriodo de Direito',1),
       // ('1ºPeriodo de Engenharia',2),('2ºPeriodo de Engenharia',2),('3ºPeriodo de Engenharia',2),('4ºPeriodo de Engenharia',2),('1°Periodo de magica',4);
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '1ºPeriodo de Direito',
               'Curso_id' => '1'
           )
           );
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '2ºPeriodo de Direito',
               'Curso_id' => '1'
           )
           );
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '3ºPeriodo de Direito',
               'Curso_id' => '1'
           )
           );
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '1ºPeriodo de Sistemas',
               'Curso_id' => '2'
           )
           );
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '2ºPeriodo de Sistemas',
               'Curso_id' => '2'
           )
           );
       DB::table('cursos')
       ->insert(
           array(
               'nomePeriodo' => '3ºPeriodo de Sistemas',
               'Curso_id' => '2'
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
        //
    }
}
