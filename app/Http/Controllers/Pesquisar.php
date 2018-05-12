<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;
use DB;
use App\Models\Funcionario;

class Pesquisar extends BaseController
{
  public function Professor(Request $request){

if($request->PesquisarPor==="Id"){
$Result=
     Funcionario::
     where('id',$request->CampoPesquisa)
     ->get();
}if($request->PesquisarPor==="Nome"){


}if($request->PesquisarPor==="CPF"){


}

    
     
     return Response::json(array('Result'=>$Result)); 


  }
  public function Curso(Request $request){

  }
  
  public function ListarTodosOsDadosProfessor(Request $request){
     $RSFuncionario=
     DB::table('funcionarios')//Pegar dados de funcionario
     ->find($request->id)
     ->get();

     $RSid_materias=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->where('id_funcionario',$request->id)
     ->get();


     foreach($RSid_materias as $ID){
      $DadosMateria[]=
      DB::table('materias')
      ->find($ID->id_materia)//id(materia)=id_materia(funcionarios_materias)
      ->get();//para pegar id e nome da materia

         foreach($DadosMateria as $ColunasMat){
          $DadosPeriodo[]=
          DB::table('periodos')
          ->find($ColunasPer->periodo_id)//id(periodos)=periodo_id(materias)
          ->get();//para pegar id e nome do periodo

              foreach($DadosPeriodo as $ColunasPer){
                $DadosCurso[]=
                DB::table('cursos')
                ->find($ColunasCur->curso_id)//id(curso)=curso_id(periodos)
                ->get();//para pegar id e nome do periodo
      
              }
         }
     }

return redirect()
->route('Rota de GerenciarProfessor')
->with('TabelaFuncionario',$RSFuncionario)
->with('TabelaMateria',$DadosMateria)
->with('TabelaMateria',$DadosPeriodo)
->with('TabelaMateria',$DadosCurso);

  }
  



}