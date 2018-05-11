<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Funcionario;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class test extends Controller
{
    public function AjaxTest(Request $request){
 
        return Response::json(json_encode($request->Campo)); 
     
    
       }
    public function AjaxSoma(Request $request){
        $A=$request->Campo;
        $B=$request->Campo2;
        /*$X= DB::table('funcionarios')
         ->select('id','nome')
         ->get();*/
         $X= DB::table('cursos')
         ->select('id','nome_curso')
         ->get();
          // $X= Funcionario::get();//Lembrete de utilizar:use App\Models\Funcionario;

              foreach($X as $dados){
                $Array[]=$dados->id;
                $Array[]=$dados->nome_curso;
              }
              
             // return redirect()->action('Entrada_Saida@RetornarView');
              //return redirect()->route('MarcarPonto');
              return response()->json(json_encode($Array));
       }
      
}
