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
use App\Models\Curso;
use App\Models\Periodo;

class GerenciarCursos extends BaseController
{   
    

    function CarregarCursos(){//inserir no select curso
    $Cursos=
    Curso::get();
  

return Response::json(array('Cursos'=>$Cursos)); 
   }
   function CarregarTurno(Request $request){
    $Cursos=
    Curso::find($request->IdCurso);
     return Response::json(array('Cursos'=>$Cursos)); 
   }

   function CarregarSala(Request $request){
    $Sala= 
    Periodo::select('sala')->where('id',$request->IdPeriodo)->get();

    return Response::json(array('Sala'=>$Sala)); 
   }
  
   public function Curso(Request $request){

    if($request->EscolhidoComando=='Editar'){
      Curso::
      update('nome_curso',$request->CampoDeTexto)
      ->update('turno',$request->turno)
      ->where('id',$request->IdCurso);

    }if($request->EscolhidoComando=='Remover'){
      Curso::
      where('id',$request->IdCurso)
      ->delete();
  
    }if($request->EscolhidoComando=='Adicionar'){
      
      $Curso=new Curso;
      $Curso->nome_curso=$request->CampoDeTexto;
      $Curso->turno=$request->Turno;
      $Curso->save();
      
    }else

     return Response::json(); 

   }

   
   public function Periodo(Request $request){//Necessario pegar de ajax id de periodo,Comando escolhido e Campo de texto

    if($request->EscolhidoComando="Editar"){
      Periodo::
      update('nome_periodo',$request->CampoDeTexto)
      ->update('turno',$request->Sala)
      ->where('id',$request->IdPeriodo);

    }if($request->EscolhidoComando="Remover"){


    }if($request->EscolhidoComando="Adicionar"){
      Periodo::
      insert('nome_periodo',$request->CampoDeTexto)
      ->insert('turno',$request->Sala);
        
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