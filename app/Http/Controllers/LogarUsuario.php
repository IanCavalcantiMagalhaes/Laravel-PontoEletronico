<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
class LogarUsuario extends Controller// Sao dados sensiveis entao utiliza POST
{
   
    public function Validar(Request $request){

   
  $this->validate($request,[
    'nome'=>'required',
    'senha'=>'required'
  ]);

   $RS=
   Usuario::
        where('nome',$request->nome)
      ->where('senha',$request->senha)
      ->get();
       
  if($RS->isNotEmpty()){

    session([
      'nome'=>$request->nome
    ]);
    
    return redirect()->route('PaginaMarcarPonto'); 
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

