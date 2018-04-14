<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeCurso');
            $table->string('turno');
            $table->timestamps();
        });
       // INSERT INTO Cursos(NomeCurso,Turno) VALUES ('Direito','Matutino'),('Engenharia','Vespertino')
//,('Sistema de informaçao','Noturno'),('Curso de magica','Matutino');
    /*    DB::table('cursos')
        ->insert('nomeCurso',"Direito")
        ->insert('turno',"Matutino");

*/
    }
//INSERT INTO Cursos(NomeCurso,Turno) VALUES ('Direito','Matutino'),('Engenharia','Vespertino')
//,('Sistema de informaçao','Noturno'),('Curso de magica','Matutino');

//INSERT INTO Cursos(NomeCurso) VALUES ('Direito'),('Engenharia')
//,('Sistema de informaçao'),('Curso de magica');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
