<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;
use DB;

class Pesquisar extends BaseController
{
  public function Professor(Request $request){
//if($resquest->PesquisarPor='Id'){
$Result=DB::table('funcionario')
     ->select('id','nome')
     ->where('id',$request->CampoPesquisa)->get();
//}

    
     
     return Response::json(array('Result'=>$Result)); 


  }public function ListarTodosOsDadosProfessor(Request $request){
     $RSFuncionario=
     DB::table('funcionarios')//Pegar dados de funcionario
     ->find($request->id)
     ->get();

     $id_materias=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->where('id_funcionario',$request->id)
     ->get();


     foreach($id_materias as $ID){
      $DadosMateria[]=
      DB::table('materias')
      ->find($ID->id_materia)
      ->get();
       

     }

return redirect()
->route('Rota de GerenciarProfessor')
->with('TabelaFuncionario',$RSFuncionario)
->with('TabelaMateria',$DadosMateria);

  }
  



}