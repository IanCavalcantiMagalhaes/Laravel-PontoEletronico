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
//if($resquest->PesquisarPor='id'){
$Result=DB::table('Funcionario')
     ->select('id','nome')
     ->where('id',$request->CampoPesquisa)->get();
//}

    
     
     return Response::json(array('Result'=>$Result)); 


  }
  



}