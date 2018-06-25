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

        return view('Principal',['Usuarios' => $request->Usuarios]);
    }
    public function VerificarPermissividade(){
          $User=Usuario::find($request->id);
          if($User->nivel=="2"){
              if($request->Escolha=="Alterar"){
                return redirect()->action('Configuraçoes@EditarRemoverUsuario'); 

              }if($request->Escolha=="Adicionar"){
                 return redirect()->action('Configuraçoes@EditarRemoverUsuario'); 

             }
          }else{
            return redirect()->action('Configuraçoes@RetornarView')->with('NegarAcesso',"Negar Acesso"); 
         }
    }
    public function EditarRemoverUsuario(){
                 $Usuarios=Usuario::all();
            return redirect()->action('Configuraçoes@RetornarView', ['Usuarios' => $Usuarios]);//Com request que abrirá form de editar e remover
            
        
    }
    public function AdicionarUsuario(){
   return redirect()->action('Configuraçoes@RetornarView')->with('Cadastrar',"Opçao de cadastrar");//Com request que abrirá form de editar e remover
   

}
     

}