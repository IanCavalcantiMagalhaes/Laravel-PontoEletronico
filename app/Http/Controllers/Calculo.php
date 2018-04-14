<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class Calculo extends Controller
{
    public function AjaxTest(Request $request){
 
        return Response::json(json_encode($request->Campo)); 
     
    
       }
    public function AjaxSoma(Request $request){
        $A=$request->Campo;
        $B=$request->Campo2;
          $Resultado=$A+$B;
        return Response::json(json_encode($Resultado)); 
     
    
       }
}
