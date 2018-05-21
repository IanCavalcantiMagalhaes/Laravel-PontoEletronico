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
    $FM->save();

     return redirect()->route('GerenciarProfessor');

}
public function RemoverMateriaDoProfessor(Request $request){
    DB::table('funcionarios_materias')
    ->where('id_funcionario',$request->funcionario_id)
    ->where('id_materia',$request->materia_id)
    ->delete();

     return redirect()->route('Pesquisar');
}

public function AtualizarProfessor(Request $request){

    $F=Funcionario::find($request->ID);
    $F->nome=$request->Nome;
    $F->CPF=$request->CPF;
    $F->save();
   // return redirect()->route('AtualizarPagina')->with('id',$request->ID);
    return redirect()->route('Pesquisar');
}
public function ApagarProfessor(Request $request){

    $F=Funcionario::find($request->ID);
    $F->delete();
    return redirect()->route('MarcarPonto');
}


  public function ListarTodosOsDadosProfessorComModel(Request $request){//sera utilizado tanto para selecionar resultado de pesquisa e atualizar pagina depois de alteraçao

    $DadosFuncionario=
     Funcionario::find($request->ID);//$request->ID

     $Dadosid_materia=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->select('materia_id')
     ->where('funcionario_id',$request->ID)
     ->get();

     
   if($Dadosid_materia->isNotEmpty()){//Caso nao seja nulo

   
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
}else{
     $NomeMateria=null;
     $Periodo_id=null;
     $NomePeriodo=null;
     $Curso_id=null;
     $NomeCurso=null;  
}
           $Cursos=Curso::get();

return view('GerenciarProfessor')
->with('TabelaFuncionario',$DadosFuncionario)
->with('TabelaIDMateria',$Dadosid_materia)
->with('TabelaNomeMateria',$NomeMateria)
->with('TabelaPeriodo',$NomePeriodo)
->with('TabelaCurso',$NomeCurso)
->with('navbar','Gerenciar Professor')
->with('Cursos',$Cursos);
  

  }
  public function AtualizarPagina($id){//sera utilizado tanto para selecionar resultado de pesquisa e atualizar pagina depois de alteraçao

    $DadosFuncionario=
     Funcionario::find($id);//$request->ID

     $Dadosid_materia=
     DB::table('funcionarios_materias')//Pegar materias relacionadas com funcionario
     ->select('materia_id')
     ->where('funcionario_id',$id)
     ->get();

     
   if($Dadosid_materia->isNotEmpty()){//Caso nao seja nulo

   
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
}else{
     $NomeMateria=null;
     $Periodo_id=null;
     $NomePeriodo=null;
     $Curso_id=null;
     $NomeCurso=null;  
}
           $Cursos=Curso::get();

return view('GerenciarProfessor')
->with('TabelaFuncionario',$DadosFuncionario)
->with('TabelaIDMateria',$Dadosid_materia)
->with('TabelaNomeMateria',$NomeMateria)
->with('TabelaPeriodo',$NomePeriodo)
->with('TabelaCurso',$NomeCurso)
->with('navbar','Gerenciar Professor')
->with('Cursos',$Cursos);
  

  }
}