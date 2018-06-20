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
          $Result=
          Funcionario::
          where('nome','LIKE','%'.$request->CampoPesquisa.'%')
          ->get();

      }if($request->PesquisarPor==="CPF"){
          $Result=
          Funcionario::
          where('CPF',$request->CampoPesquisa)
          ->get();

      }
     
     return Response::json(array('Result'=>$Result)); 


  }
  public function ProfessorTest(Request $request){//https://stackoverflow.com/questions/29548073/laravel-advanced-wheres-how-to-pass-variable-into-function
    $CampoPesquisa=$request->CampoPesquisa;
    $PesquisarPor=$request->PesquisarPor;
    $Cargo=$request->Cargo;

      Funcionario::
        where(function ($Result) use ($CampoPesquisa,$PesquisarPor,$Cargo) {
      
          if($PesquisarPor==="Id"){
            $Result->
            where('id',$CampoPesquisa)
            ->get();

          }if($PesquisarPor==="Nome"){
            $Result->
            where('nome','LIKE','%'.$CampoPesquisa.'%')
            ->get();

          }if($PesquisarPor==="CPF"){
            $Result->
            where('CPF',$CampoPesquisa)
            ->get();

          }if($Cargo!="Todos"){//se possui request cargo
            $Result->
            where('Cargo',$request->Cargo)
            ->get();

          }
        })->get();
     
     return Response::json(array('Result'=>$Result)); 

  }

  public function Curso(Request $request){
    if($request->PesquisarPor==="Id"){
      $Result=
           Curso::
           where('id',$request->CampoPesquisa)
           ->get();
      }if($request->PesquisarPor==="Nome"){
        $Result=
        Curso::
        where('nome',$request->CampoPesquisa)
        ->get();
      
      }
  }
  
  public function ProfessorTestSemAjax(Request $request){//https://stackoverflow.com/questions/29548073/laravel-advanced-wheres-how-to-pass-variable-into-function
    $CampoPesquisa=$request->CampoPesquisa;
    $PesquisarPor=$request->PesquisarPor;
    $Cargo=$request->Cargo;

      Funcionario::
        where(function ($Result) use ($CampoPesquisa,$PesquisarPor,$Cargo) {
      
          if($PesquisarPor==="Id"){
            $Result->
            where('id',$CampoPesquisa)
            ->get();

          }if($PesquisarPor==="Nome"){
            $Result->
            where('nome','LIKE','%'.$CampoPesquisa.'%')
            ->get();

          }if($PesquisarPor==="CPF"){
            $Result->
            where('CPF',$CampoPesquisa)
            ->get();

          }if($Cargo!="Todos"){//se possui request cargo
            $Result->
            where('Cargo',$request->Cargo)
            ->get();

          }
        })->get();
        
        $ResultTitulo[]="Id";
        $ResultTitulo[]="Nome";
        $ResultTitulo[]="CPF";

     return view('PaginaMarcarPonto')->with($Result)->with($ResultTitulo); 

  }
  

}