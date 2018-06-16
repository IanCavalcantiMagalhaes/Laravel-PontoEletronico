<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Models\Funcionario;
use App\Models\Curso;
class test extends Controller
{
    public function AjaxTest(Request $request){
 
        return Response::json(json_encode($request->Campo)); 
     
    
       }
    public function AjaxSoma(Request $request){
       
        /* Funcionario::find(1)
         ->select('Trabalhando')
         ->get();*/
        // $X=
        return Funcionario::where('id',1)
         ->get();
         
      
              foreach($X as $dados){
                $Array[]=$dados->Trabalhando;
                $Array[]=$dados->nome;
              }
              
            //return response()->sucess(array(
                //'band'=>$Array));
       }
       public function Test(Request $request){
 
        return Response::json(json_encode("OLA")); 
     
    
       }
}
