<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');//->unique()
            $table->string('nivel');
            $table->string('senha');
            $table->timestamps();
        });
        DB::table('usuarios')->insert(
            array(
                'nome' => 'Ian',
                'senha' => '123456',
                'nivel' => '2'
            )
        );
        DB::table('usuarios')->insert(
            array(
                'nome' => 'Fulano',
                'senha' => '123456',
                'nivel' => '1'
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
        Schema::dropIfExists('Usuario');
    }
}
