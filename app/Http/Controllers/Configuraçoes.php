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
use App\Models\FuncionarioMateria;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Usuario;

class Configuraçoes extends BaseController//tera conjuntos de views em que dependendo do selecionado ira incluir outra view
{
    public function RetornarView(){

        return view('Principal')->with('navbar',"Configuraçoes");
    }
    public function RealizarAçao(){
          $User=Usuario::where('Nome',$request->Nome)->first();

          if($User->nivel=="2"){//Verificar permissividade

              if($request->Escolha=="Alterar"){
                return redirect()->action('Configuraçoes@ViewEditarRemoverUsuario'); 

              }if($request->Escolha=="Adicionar"){
                 return redirect()->action('Configuraçoes@ViewAdicionarUsuario'); 

             }
          }else{
            return redirect()->action('Configuraçoes@RetornarView')->with('NegarAcesso',"Negar Acesso"); 
         }
    }
    public function ViewEditarRemoverUsuario(){
            $Usuarios=Usuario::all();
            return view('EditarRemoverUsuario', ['Usuarios' => $Usuarios]);
            
        
    }
    public function ViewAdicionarUsuario(){
            return view('AdicionarUsuario');
   

}
     public function AlterarUsuario(){

    
$Liberar=true;

$User=usuario::where('nome','!=',$request->NomeAntigo);//O '!=' servira para guando ele nao querer alterar nome (NomeAntigo=NovoNome)

foreach($User as $U){
     if($U->nome==$request->NovoNome){
          $Liberar=false;
     }
}
 if($Liberar===false){
    return redirect()->route('EditarERemover')->with('Alerta',"Outro usuario tem esse nome,escolha outro nome");
 }else{

    usuario::where('nome',$request->NomeAntigo)  
    ->update([									
                'nome'=>$request->NovoNome,
                'senha'=>$request->senha
            ]);
    /*$User=usuario::where('nome',$request->NomeAntigo)->firts();
    $User->nome=$request->NovoNome;
    $User->senha=$request->senha;*/

}
 }
}