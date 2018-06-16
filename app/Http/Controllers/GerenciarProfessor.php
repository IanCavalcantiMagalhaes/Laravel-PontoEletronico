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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use json;
use App\Models\Funcionario;
use App\Models\FuncionarioMateria;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Materia;

class GerenciarProfessor extends BaseController
{
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
public function AdicionarMateriaAoProfessor(Request $request){

    $Tabela=
        FuncionarioMateria::
        where('funcionario_id',$request->ID)
        ->get();
        $Contar=0;
        $PermitirAdiçao=true;
        foreach($Tabela as $dados){//ira verificar se id de funcionario e materia ja estao relacionados,se tiver nao ira permitir adiçao
                 if($dados->materia_id==$request->MateriaAdicionar){
                    $PermitirAdiçao=false;
                    }
                $Contar++;
                 if($Contar===5){//se professor ultrapassou o limite de 5 materias
                    $PermitirAdiçao=false;
                 }
        }
  
if($PermitirAdiçao===true){
     $FM=new FuncionarioMateria;
    $FM->funcionario_id=$request->ID;
    $FM->materia_id=$request->MateriaAdicionar;
    $FM->save();
    $Resultado="Adicionado Com Sucesso";

}else{
    $Resultado="Falha na adiçao - Possivelmente foi adicionada materia ja adicionada ao professor ou professor pode ter atingido limite maximo de 5 materias";
}
   

    return redirect()
    ->action('GerenciarProfessor@ListarTodosOsDadosProfessorComModel',
    ['ID'=>$request->ID])->with('AlertaDeAdiçao',$Resultado);//ira atualizar pagina

}
public function RemoverMateriaDoProfessor(Request $request){
    FuncionarioMateria::
    where('funcionario_id',$request->ID)
    ->where('materia_id',$request->MateriaRemover)
    ->delete();

    return redirect()
    ->action('GerenciarProfessor@ListarTodosOsDadosProfessorComModel',
    ['ID'=>$request->ID])->with('AlertaDeRemoçao',"Materia removida com sucesso");//ira atualizar pagina
}

public function AtualizarProfessor(Request $request){

    $this->validate($request,[
        'Nome'=>'required',
        'CPF'=>'required',
        'CEP'=>'required'
      ]);

    $F=Funcionario::find($request->ID);
    $F->nome=$request->Nome;
    $F->CPF=$request->CPF;
    $F->CEP=$request->CEP;
    $F->Telefone=$request->Telefone;
    if($request->Cargo){
       $F->Cargo=$request->Cargo; 
    }
    $F->save();
   // return redirect()->route('AtualizarPagina')->with('id',$request->ID);
    return redirect()
    ->action('GerenciarProfessor@ListarTodosOsDadosProfessorComModel',
    ['ID'=>$request->ID])->with('AlertaDeAtualizaçao',"Dados atualizados com sucesso");//ira atualizar pagina(Levando request necessario para controller)
}
public function ApagarProfessor(Request $request){

    $F=Funcionario::find($request->ID);
    $F->delete();
    $FM=FuncionarioMateria::where('funcionario_id',$request->ID);
    $FM->delete();

    return redirect()->route('PaginaMarcarPonto')->with('AlertaDeRemoçao',"Professor apagado com sucesso");
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

  public function ListarTodosOsDadosProfessor(Request $request){//sera utilizado tanto para selecionar resultado de pesquisa e atualizar pagina depois de alteraçao

    $DadosFuncionario=
     Funcionario::find(1);//$request->ID

     $id_materia=
     FuncionarioMateria:://Pegar materias relacionadas com funcionario
     select('materia_id')
     ->where('funcionario_id',$request->ID)
     ->pluck('materia_id');

       foreach($id_materia as $id_materia){
          $ResultadosDeRelacionamento[]=//se acumulara neste array
     Materia::
       where('materias.id',$id_materia)//juntar materia com seus respectivos periodos e cursos
     ->join('periodos','materias.periodo_id','=','periodos.id')
     ->join('cursos','periodos.curso_id','=','cursos.id')
     
     ->get(); 
       }
     
  

  }
  public function PermitirEdiçao(Request $request){
    $Admin=Usuario::find($request->idAdmin);

    if($Admin->nivel=="2"){
       return response()->json(array("Liberar"=>true));
    }if($Admin->nivel=="1"){
       return response()->json(array("Liberar"=>false));
    }
    return response()->json(array("Liberar"=>true));
        }
}