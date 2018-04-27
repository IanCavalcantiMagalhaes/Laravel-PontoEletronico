<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogarUsuario extends Controller// Sao dados sensiveis entao utiliza POST
{
    public function Validar(Request $request){
           $request->validator([
             'Ian'=>''
           ]);
     /*  
     
     $RS=Usuario::
       where('nome',$request->nome)
       ->where('senha',$request->senha)->get();
*/
        
        if($RS=null){
           return view('Login')->with('ERRO',"Dados incorretos");
        }else{
            
           return view('Principal');
        }
    }
    public function testValidar(Request $request){

        /*  $RS=Usuario::
          where('nome',$request->nome)
          ->where('senha',$request->senha)->get();
   */
           
           if($request->nome=='Ian' && $request->senha=='123456'){
             return redirect()->route('MarcarPonto'); 
           }else{
            return redirect()->route('PaginaLogar')->with('ERRO',"Dados incorretos");
           }
       }
}
