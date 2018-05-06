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
    DB::table('funcionarios_materias')
    ->insert('id_funcionario',$request->id_Funcionario)
    ->insert('id_materia',$request->id_Materia);
     return redirect()->route('GerenciarProfessor');
}
public function RemoverMateriaDoProfessor(Request $request){
    DB::table('funcionarios_materias')
    ->where('id_funcionario',$request->id_Funcionario)
    ->where('id_materia',$request->id_Materia)
    ->delete();
     return redirect()->route('GerenciarProfessor');
}

public function ListarTodosOsDadosProfessor(Request $request){

    $DadosFuncionario=
    DB::table('funcionarios')//Pegar dados de funcionario
    ->find($request->id)
    ->get();

    $DadosFuncionario=
     DB::table('funcionarios')//Pegar dados de funcionario
     ->find(1);

     $RSid_materia=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->select('materia_id')
     ->where('funcionario_id','1')
     ->get();


     foreach($RSid_materias as $ID){
      $DadosMateria[]=
      DB::table('materias')
      ->select('')
      ->find($ID->materia_id)//id(materia)=id_materia(funcionarios_materias)
      ->get();//para pegar id e nome da materia

         foreach($DadosMateria as $ColunasMat){
          $DadosPeriodo[]=
          DB::table('periodos')
          ->select('nome_periodo')
          ->find($ColunasPer->periodo_id)//id(periodos)=periodo_id(materias)
          ->get();//para pegar id e nome do periodo

              foreach($DadosPeriodo as $ColunasPer){
                $DadosCurso[]=
                DB::table('cursos')
                ->select('nome_curso')
                ->find($ColunasCur->curso_id)//id(curso)=curso_id(periodos)
                ->get();//para pegar id e nome do periodo
      
              }
         }
     }

return view('GerenciarProfessor')
->with('TabelaFuncionario',$DadosFuncionario)
->with('TabelaIDMateria',$Dadosid_materia)
->with('TabelaPeriodo',$DadosPeriodo)
->with('TabelaCurso',$DadosCurso);

  }
}