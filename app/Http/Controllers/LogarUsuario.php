<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validate;

class LogarUsuario extends Controller// Sao dados sensiveis entao utiliza POST
{
    public function Validar(Request $request){
           $this->validator($request,[
             'nome'=>'required',
             'senha'=>'required'
           ]);
         
     /*  
     $RS=Usuario::
       where('nome',$request->nome)
       ->where('senha',$request->senha)->get();
*/
        
        if($RS=null || ($request->nome=='Ian' && $request->senha=='123456')){
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
  $this->validate($request,[
    'nome'=>'required',
    'senha'=>'required'
  ]);
 
  if($request->nome=='Ian' && $request->senha=='123456'){
    session([
      'nome'=>$request->nome
    ]);
    return redirect()->route('MarcarPonto'); 
  }else{

   return redirect()->route('PaginaLogar')->with('ERRO',"Dados incorretos");
  }
          
    
  }
       public function RetornarView(Request $request){
        return view('Login');
       }
       public function Logout(){
         session()->flush();
        return redirect()->route('PaginaLogar');

       } 
}

