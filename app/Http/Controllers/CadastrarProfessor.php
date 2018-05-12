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
  // https://cursos.alura.com.br/forum/topico-como-exibir-imagem-da-pasta-storage-laravel-50551
   public function InserirProfessor(Request $request){
    $this->validate($request,[
      'nome'=>'required',
      'cpf'=>'required',
      'cep'=>'required',
      'curso' => 'required|not_in:1',
      'periodo' => 'required|not_in:1',
      'materia' => 'required|not_in:1',
      'image'=> 'image'
    ]);
$Funcionario= new Funcionario;
$Funcionario->nome=$request->nome;
$Funcionario->CPF=$request->cpf;
$Funcionario->CEP=$request->cep;
$Funcionario->save();

$AdicionadoAnteriormente=Funcionario::latest()->first();//pegar valor adicionado recentemente na linha 32 ate 36(latest=ultimo)

$Funcionario_Materia= new Funcionario_Materia;
$Funcionario_Materia->id_funcionario=$AdicionadoAnteriormente->id;
$Funcionario_Materia->id_materia=$request->materia;//sera pego do select o id de uma materia
$Funcionario_Materia->save();


   if($request->file('image')!=null){
$file = $request->file('image')->store('Img');
   }
    

/*
    DB::table('Professor')
    ->insert('Nome',$pedido->Nome)
    ->insert('CPF',$pedido->CPF)
    ->insert('CEP',$pedido->CEP)
    ->insert('Telefone',$pedido->Telefone) 
    ->insert('ID_Materia',$pedido->input(''));                                                                         
  */
  return redirect()->route('MarcarPonto');
   }public function AjaxTest(Request $request){
 
    return Response::json(json_encode($request->Campo)); 
 

   }public function AjaxPeriodo(Request $request){//inserir em periodos

    if(!$request->IdCurso){
      return Response::json(false); 
    }else{
     $Periodos=
      DB::table('periodos')
      ->select('id','nome_periodo')
      ->where('curso_id',$request->IdCurso)->get();
    

return Response::json(array('Periodos'=>$Periodos)); 
    }

    }public function AjaxMateria(Request $request){//inserir materias
      if(!$request->IdPeriodo){//deixara vazio por que escolheu a opçao 'selecione um periodo' em que nao existe id
        return Response::json(false); 

      }else{
        
  $ID_e_NomeMateria=
    DB::table('materias')
  ->select('id','nome_materia')
  ->where('periodo_id',$request->IdPeriodo)
  ->get();
  
    /*Materia::
    where('Curso_id',$request->IdCurso)
    ->get();*/

  return Response::json(array('Materias'=>$ID_e_NomeMateria)); 
      
}
  
  }public function InicializarView(){
 /*   $ID_e_NomeCursos=
            DB::table('cursos')
          ->select('id','nomeCurso')
          ->get();*/
          //$ID_e_NomeCursos=Curso::all();
          $ID_e_NomeCursos= Curso::get();
          return view('PaginaCadastrarProfessor')
          ->with('navbar','Cadastrar Professor')->with('Cursos',$ID_e_NomeCursos);
          
  }
}