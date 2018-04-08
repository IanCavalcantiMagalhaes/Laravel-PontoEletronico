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


class CadastrarProfessor extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function InserirProfessor(Request $pedido){

    DB::table('Professor')
    ->insert('Nome',$pedido->Nome)
    ->insert('CPF',$pedido->CPF)
    ->insert('CEP',$pedido->CEP)
    ->insert('Telefone',$pedido->Telefone) 
    ->insert('ID_Materia',$pedido->input(''));                                                                         
  
  
   }public function AjaxTest(Request $request){
 
    return Response::json(json_encode($request->Campo)); 
 

   }public function IrParaPaginaDeCadastroProfessor(Request $request){//inserir Cursos

    $ID_e_NomeCursos=
      DB::table('Curso')
    ->select('id','nomeCurso')
    ->get();
    
    return view('PaginaCadastrarProfessor')->with('Cursos',$ID_e_NomeCursos);
    
    }public function AjaxPeriodo(Request $request){//inserir periodos
     $Periodos=
      DB::table('periodo')
    ->where('Curso_id',$request->IdCurso)
    ->get();
    

return Response::json(array('Periodos'=>$Periodos)); 


    }public function AjaxMateria(Request $request){//inserir materias

  $ID_e_NomePeriodos=
    DB::table('Materia')
  ->select('id','nome')
  ->where('Periodo_id',$request->input('idPeriodo'))//input do select periodo
  ->get();
  
  return Response::json(json_encode($ID_e_NomeMateria)); 
  
  }
}