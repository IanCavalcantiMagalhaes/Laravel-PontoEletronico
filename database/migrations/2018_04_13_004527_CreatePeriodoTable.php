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
            $table->string('nome_periodo');
            $table->string('curso_id')->references('id')->on('Curso');
            $table->string('sala');
            
        });    
       // INSERT INTO periodos(NomePeriodo,Curso_id) VALUES ('1ºPeriodo de Direito',1),('2ºPeriodo de Direito',1),('3ºPeriodo de Direito',1),('4ºPeriodo de Direito',1),
       // ('1ºPeriodo de Engenharia',2),('2ºPeriodo de Engenharia',2),('3ºPeriodo de Engenharia',2),('4ºPeriodo de Engenharia',2),('1°Periodo de magica',4);
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '1ºPeriodo de Direito',
               'curso_id' => '1',
               'sala' => '101'
           )
           );
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '2ºPeriodo de Direito',
               'curso_id' => '1',
               'sala' => '102'
           )
           );
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '3ºPeriodo de Direito',
               'curso_id' => '1',
               'sala' =>'302'
           )
           );
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '1ºPeriodo de Sistemas',
               'curso_id' => '2',
               'sala' =>'304'
           )
           );
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '2ºPeriodo de Sistemas',
               'curso_id' => '2',
               'sala' =>'702'
           )
           );
       DB::table('periodos')
       ->insert(
           array(
               'nome_periodo' => '3ºPeriodo de Sistemas',
               'curso_id' => '2',
               'sala' =>'602'
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
