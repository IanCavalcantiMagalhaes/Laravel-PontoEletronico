<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Pesquisar extends BaseController
{
  public function ExecutarPesquisa(Request $request){
    if($request->ValorSelecionado='Nome' || $request->ValorSelecionado='Selecione'){

     $nome=DB::table('Funcionario')->select('nome')->where('nome',$request->campoPesquisa)->first();
    // return view('PaginaPesquisar')->with('Nomes',$nome); 

    }if($request->ValorSelecionado='id'){
     $id=DB::table('Funcionario')->select('nome')->where('id',$request->CampoPesquisa);
    // return view('PaginaPesquisar',['id' => $id]);
    }if($request->ValorSelecionado='CPF'){
     $id=DB::table('Funcionario')->select('nome')->where('CPF',$request->CampoPesquisa);
   //  return view('PaginaPesquisar',['id' => $id]);
     }

if($request->campoPesquisa===null){//Caso nao tiver nada digitado
  return view('PaginaPesquisar')->with('Nomes',null);
}else{
  

     $nome=DB::table('Funcionario')->select('nome')->where('nome',$request->campoPesquisa)->limit(15)->get();
     return view('PaginaPesquisar')->with('Nomes',$nome);
}
  }
  
  public function Id(Request $request){
    $id=DB::table('Funcionario')->select('nome')->where('id',$request->CampoPesquisa);
    return view('PaginaPesquisar',['id' => $id]);
  }

  public function Pagina(Request $request){//pagina sem tabela
 
    return view('PaginaPesquisar',['Nomes' => null]);
  }



}