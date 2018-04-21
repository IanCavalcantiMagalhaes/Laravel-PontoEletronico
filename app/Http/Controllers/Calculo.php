<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Calculo extends Controller
{
    public function AjaxTest(Request $request){
 
        return Response::json(json_encode($request->Campo)); 
     
    
       }
    public function AjaxSoma(Request $request){
        $A=$request->Campo;
        $B=$request->Campo2;
         $X= DB::table('funcionarios')
              ->get();
      //return Response::json($request->Campo); 
      return response()->json(json_encode($X));
     // return Response::json(json_encode($RS));  
     // return Response::json(array('RS'=>$RS)); 
       }
}
