<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios_materias', function (Blueprint $table) {
            $table->integer('funcionario_id');
            $table->integer('materia_id');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('funcionarios_materias')
        ->insert(array(
            'funcionario_id' => '1',
            'materia_id' => '1'
        ));
        DB::table('funcionarios_materias')
        ->insert(array(
            'funcionario_id' => '1',
            'materia_id' => '2'
        ));
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
