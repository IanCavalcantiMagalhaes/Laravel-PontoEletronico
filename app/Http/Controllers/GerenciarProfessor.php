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
use json;
use App\Models\Funcionario;
use App\Models\FuncionarioMateria;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Materia;

class GerenciarProfessor extends BaseController
{
public function Test(){

$Professor=array([
    'nome'=>"Ian",
    'CPF'=>"12345"
]
);
}

public function AdicionarMateriaAoProfessor(Request $request){

    $FM=new FuncionarioMateria;
    $FM->funcionario_id=$request->id_Funcionario;
    $FM->materia_id=$request->id_Materia;


     return redirect()->route('GerenciarProfessor');

}
public function RemoverMateriaDoProfessor(Request $request){
    DB::table('funcionarios_materias')
    ->where('id_funcionario',$request->funcionario_id)
    ->where('id_materia',$request->materia_id)
    ->delete();

     return redirect()->route('GerenciarProfessor');
}

public function ListarTodosOsDadosProfessor(Request $request){

    /*$DadosFuncionario=
    DB::table('funcionarios')//Pegar dados de funcionario
    ->find($request->id)
    ->get();*/

    $DadosFuncionario=
     Funcionario:://Pegar dados de funcionario
     find($request->ID);//$request->ID

     $Dadosid_materia=
     FuncionarioMateria:://Pegar materias relacionadas com funcionario
     where('funcionario_id',$DadosFuncionario->id)//$request->ID
     ->get();

   
//foreach($Dadosid_materia as $Dadosid_materia){
   for($i=0;$i<sizeOf($Dadosid_materia);$i++){
       
      $NomeMateria[]=
      
      DB::table('materias')
      ->select('nome_materia')
      ->where('id',$Dadosid_materia[$i]->materia_id)//id(materia)=id_materia(funcionarios_materias)
      ->pluck('nome_materia');//para pegar nome da materia
      

      $Periodo_id[]=
      DB::table('materias')
      ->select('periodo_id')
      ->where('id',$Dadosid_materia[$i]->materia_id)//id(materia)=id_materia(funcionarios_materias)
      ->pluck('periodo_id');//para pegar chave estrageira de materia(para saber em que periodo esta)
      //$NomeMateria[$i]=json_decode($NomeMateria[$i],true);
   }

      for($i=0;$i<sizeOf($Periodo_id);$i++){
          $NomePeriodo[]=
          DB::table('periodos')
          ->select('nome_periodo')
          ->where('id',$Periodo_id[$i])//id(periodos)=periodo_id(materias)
          ->pluck('nome_periodo');//para pegar nome do periodo

          $Curso_id[]=
          DB::table('periodos')
          ->select('curso_id')
          ->where('id',$Periodo_id[$i])//id(periodos)=periodo_id(materias)
          ->pluck('curso_id');//para pegar nome do periodo
      }
          for($i=0;$i<sizeOf($Dadosid_materia);$i++){
                $NomeCurso[]=
                DB::table('cursos')
                ->select('nome_curso')
                ->where('id',$Curso_id[$i])//id(curso)=curso_id(periodos)
                ->pluck('nome_curso');//para pegar id e nome do periodo
               }/**/
           
return view('GerenciarProfessor')
->with('TabelaFuncionario',$DadosFuncionario)
->with('TabelaIDMateria',$Dadosid_materia)
->with('TabelaNomeMateria',$NomeMateria)
->with('TabelaPeriodo',$NomePeriodo)
->with('TabelaCurso',$NomeCurso)
->with('navbar','Gerenciar Professor');
  

  }

  public function ListarTodosOsDadosProfessorComModel(Request $request){//sera utilizado tanto para selecionar resultado de pesquisa e atualizar pagina depois de alteraçao

    $DadosFuncionario=
     Funcionario::find($request->ID);//$request->ID

     $Dadosid_materia=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->select('materia_id')
     ->where('funcionario_id','1')
     ->get();

   
//foreach($Dadosid_materia as $Dadosid_materia){
   for($i=0;$i<sizeOf($Dadosid_materia);$i++){
       
      $NomeMateria[]=
      Materia::
      where('id',$Dadosid_materia[$i]->materia_id)//id(materia)=id_materia(funcionarios_materias)
      ->pluck('nome_materia');//para pegar nome da materia
      

      $Periodo_id[]=
      Materia::
      where('id',$Dadosid_materia[$i]->materia_id)//id(materia)=id_materia(funcionarios_materias)
      ->pluck('periodo_id');//para pegar chave estrageira de materia(para saber em que periodo esta)
      //$NomeMateria[$i]=json_decode($NomeMateria[$i],true);
   }

      for($i=0;$i<sizeOf($Periodo_id);$i++){
          $NomePeriodo[$i]=
          Periodo::select('nome_periodo')
          ->where('id',$Periodo_id[$i])//id(periodos)=periodo_id(materias)
          ->pluck('nome_periodo');//para pegar nome do periodo

          $Curso_id[$i]=
          Periodo::select('curso_id')
          ->where('id',$Periodo_id[$i])//id(periodos)=periodo_id(materias)
          ->pluck('curso_id');//para pegar nome do periodo
      }
          for($i=0;$i<sizeOf($Dadosid_materia);$i++){
                $NomeCurso[]=
                Curso::select('nome_curso')
                ->where('id',$Curso_id[$i])//id(curso)=curso_id(periodos)
                ->pluck('nome_curso');//para pegar id e nome do periodo
               }/**/
           
return view('GerenciarProfessor')
->with('TabelaFuncionario',$DadosFuncionario)
->with('TabelaIDMateria',$Dadosid_materia)
->with('TabelaNomeMateria',$NomeMateria)
->with('TabelaPeriodo',$NomePeriodo)
->with('TabelaCurso',$NomeCurso)
->with('navbar','Gerenciar Professor');
  

  }
}