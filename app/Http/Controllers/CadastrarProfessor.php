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
use App\Models\Funcionario;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Materia;

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
 

   }public function AjaxPeriodo(Request $request){//inserir em periodos

     $Periodos=
      DB::table('periodos')
      ->where('Curso_id',$request->IdCurso)->get();
    

return Response::json(array('Periodos'=>$Periodos)); 


    }public function AjaxMateria(Request $request){//inserir materias
if($request->idPeriodo!=null){
  $ID_e_NomeMateria=
    DB::table('Materia')
  ->select('id','nome')
  ->where('Periodo_id',$request->idPeriodo)//input do select periodo
  ->get();
  
    /*Materia::
    where('Curso_id',$request->IdCurso)
    ->get();*/

  return Response::json(json_encode($ID_e_NomeMateria)); 
}
  
  
  }
}