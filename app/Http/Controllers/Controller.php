<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController

{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ola(Request $pedido){
   $A=$pedido->input('Nome');

   return view('Lista')->with('Valor',$A);
    
    }
    public function AlterarHorasExtras(Request $pedido)
    {
        DB::table('Funcionario')
        ->where(id,$pedido->input('Campo'))
        ->update('HorasExtras',$pedido->input('NovasHoras'));
         
    }public function AlterarHorasDevendo(Request $pedido)
    {
        
    }
}

