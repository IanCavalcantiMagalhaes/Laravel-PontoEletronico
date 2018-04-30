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


class MostrarDados extends BaseController
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
    return view('GerenciarProfessor');



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

return view('GerenciarProfessor')
->route('Rota de GerenciarProfessor')
->with('TabelaFuncionario',$RSFuncionario)
->with('TabelaMateria',$DadosMateria)
->with('TabelaMateria',$DadosPeriodo)
->with('TabelaMateria',$DadosCurso);

  }
}