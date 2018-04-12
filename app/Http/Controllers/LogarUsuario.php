<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogarUsuario extends Controller// Sao dados sensiveis entao utiliza POST
{
    public function Validar(Request $request){
        $validar=Validator::make(
          ['nome'=>$request->nome,
           'senha'=>$request->senha]
        );
        if($validar->fails()){
           return view('Login')->with('ERRO',"Dados incorretos");
        }else{
            
        }
    }
}
