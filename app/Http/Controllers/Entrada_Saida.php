<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Entrada_Saida extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Contador(Request $request){//ao clicar no botao da PaginaContador
      if ($request->input('CPF')!=null) {
     
        $array = array(
          'CPF' =>$request->input('CPF'),
          'Tempo'=> microtime(true)

          );
        $Resultado=DB::table('funcionario')->select('Trabalhando')->where('CPF',$cpf);
           
        if ($Resultado=false){
           $arrayCPF[]=$array['CPF'];
           $arrayTempoDeEntrada[]=$array['Tempo'];
           return view('PaginaContador')->with('X','Usuario Pode Entrar'); 
        }if ($Resultado=true) {
          for ($i=0; $i<sizeof($arrayCPF);$i++) { 
            if ($arrayCPF[$i]=$array['CPF']) {
              $Tempo=(($array['Tempo']-microtime(true)/1000)/60)/60;
              DB::table('funcionario')->Update('CargaHorariaAtual','=CargaHorariaAtual+',$Tempo);
              return view('PaginaContador')->with('X','Usuario Pode Sair'); 
            }
          }
        }
       } 
  } public function LevatamentoDaSemana(Request $request){   
      $Dados=DB::table('funcionario')->get() ;

      foreach ($Dados as $Coluna){
        $ID=$Coluna->id;
        $Atual=$Coluna->CargaHorariaAtual;
        $Fixa=$Coluna->CargaHorariaFixa;
        if ($Coluna->CargaHorariaAtual < $Coluna->CargaHorariaFixa){//Nao superou o horario devido
        $HorasDevendo=$Fixa-$Atual;
        DB::table('Funcionario')
        ->where(id,$ID)
        ->increment('HorasDevendo',$HorasDevendo)
        ->update('Devendo',true);

        }if ($Coluna->CargaHorariaAtual > $Coluna->CargaHorariaFixa){//Superou o horario devido
          $HorasAMais=$Atual-$Fixa;//valor a cima do devido a ser feito por semana
          $HorasDevendo=DB::table('funcionario')->select('HorasDevendo')->where('id',$ID);
          $HorasExtras=DB::table('funcionario')->select('HorasExtras')->where('id',$ID);//Horas extras que devem ser feitas
          
        if ($Coluna->Devendo=true && $Coluna->Extra=true) { 
 
            if($HorasDevendo-$HorasAMais>0){//se horas a mais nao superou a divida
            DB::table('funcionario')
       ->where(id,$ID)->decrement('HorasDevendo',$HorasAMais)->update('Devendo',true);//ira diminuir horas devendo
            
            }
          if($HorasDevendo-$HorasAMais<=0){//se horas a mais superou a divida
              //ira para horas extras
           if($HorasExtras+($HorasDevendo-$HorasAMais)<=0){ //o '+' por causa do valor negativo
            DB::table('funcionario')
            ->where(id,$ID)->update('HorasDevendo',0)->update('Devendo',false)//ira zerar divida
            ->update('HorasExtras',0)->update('Extra',false);//ira zerar horas extras

          } if($HorasExtras+($HorasDevendo-$HorasAMais)>0){
           DB::table('funcionario')
           ->where(id,$ID)->update('HorasDevendo',0)->update('Devendo',false)//ira zerar divida
           ->decrement('HorasExtras',$HorasAMais)->update('Extra',true);//ira diminuir horas extras

          }
       }
        }if ($Coluna->Devendo=true && $Coluna->Extra=false){
          if($HorasAMais>0){
               DB::table('funcionario')
          ->where(id,$ID)->decrement('HorasDevendo',$HorasAMais)->update('Devendo',true);
            }if($HorasAMais<=0){
              DB::table('funcionario')
              ->where(id,$ID)->update('HorasDevendo',0)->update('Devendo',false);
          }
 
        }if ($Coluna->Devendo=false && $Coluna->Extra=true) {
          if($HorasExtras-$HorasAMais<=0){//se excedeu horas extras
            DB::table('funcionario')
            ->where(id,$ID)
            ->update('HorasExtras',0)//ira zerar horas extras
            ->update('Extra',false);
          }if($HorasExtras-$HorasAMais>0){//se nao excedeu horas extras
           DB::table('funcionario')
           ->where(id,$ID)
           ->decrement('HorasExtras',$HorasAMais)//ira diminuir horas extras
           ->update('Extra',true);

          }
        }
      }

}
  }
}
