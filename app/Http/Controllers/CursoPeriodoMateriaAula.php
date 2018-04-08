<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;
use DB;
use Illuminate\Support\Facades\Input;


class CursoPeriodoMateriaAula extends BaseController
{
   public function Curso(Request $request){

    if($request->EscolhidoComando="Editar"){
      DB::table('Curso')
          ->update('NomeCurso',$request->CampoDeTexto)
          ->where('id',$request->IdCurso);

    }if($request->EscolhidoComando="Remover"){
      

    }if($request->EscolhidoComando="Adicionar"){
      DB::table('Curso')->insert('NomeCurso',$request->CampoDeTexto);
    }


   }
   function InserirCurso(){//inserir inicialmente
    $Cursos=
    DB::table('Curso')
        ->get();
  

return Response::json(array('Cursos'=>$Cursos)); 
   }
   public function Periodo(Request $request){//Necessario pegar de ajax id de periodo,Comando escolhido e Campo de texto

    if($request->EscolhidoComando="Editar"){
      DB::table('Periodo')
          ->update('NomePeriodo',$request->CampoDeTexto)
          ->where('Curso_id',$request->IdCurso)
          ->where('id',$request->IdPerido);

    }if($request->EscolhidoComando="Remover"){


    }if($request->EscolhidoComando="Adicionar"){
       DB::table('Periodo')
        ->insert('NomePeriodo',$request->CampoDeTexto);
        
    }

   }
   public function Materia(){

    if($request->EscolhidoComando="Editar"){


    }if($request->EscolhidoComando="Remover"){


    }if($request->EscolhidoComando="Adicionar"){

    }

   }
   public function Aulas(){

    
    if($request->EscolhidoComando="Editar"){


    }if($request->EscolhidoComando="Remover"){


    }if($request->EscolhidoComando="Adicionar"){

    }
    
   }



}