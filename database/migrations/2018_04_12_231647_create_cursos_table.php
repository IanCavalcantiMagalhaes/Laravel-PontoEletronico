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
            $table->string('nome_curso');
            $table->string('turno');
            $table->timestamps();

        });
       // INSERT INTO Cursos(NomeCurso,Turno) VALUES ('Direito','Matutino'),('Engenharia','Vespertino')
//,('Sistema de informaçao','Noturno'),('Curso de magica','Matutino');
DB::table('cursos')
->insert(
    array(
        'nome_curso' => 'Direito',
        'turno' => 'vespertino'
    )
    );
DB::table('cursos')
->insert(
    array(
        'nome_curso' => 'Sistema de informacoes',
        'turno' => 'noturno'
    )
    );

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
