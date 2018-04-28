<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;
use DB;

class Pesquisar extends BaseController
{
  public function Professor(Request $request){
//if($resquest->PesquisarPor='Id'){
$Result=DB::table('funcionario')
     ->select('id','nome')
     ->where('id',$request->CampoPesquisa)->get();
//}

    
     
     return Response::json(array('Result'=>$Result)); 


  }public function ListarDadosProfessor(Request $request){
     $RS=DB::table('funcionarios')->find($request->id)->get();

return redirect()->route('Rota de GerenciarProfessor')->with($RS);

  }
  



}