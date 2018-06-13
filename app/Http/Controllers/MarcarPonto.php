<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;
use DB;
use App\Models\Funcionario;
use App\Models\TempoChegada;

class MarcarPonto extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public function RetornarView(Request $request){"OLA";$R[]="OI";
     //$R=null;
     $Logado=$request->session()->get('nome');
     return view('MarcarPonto')
     ->with('RespostaDePonto',$request->Resposta)
     ->with('navbar','Marcar Ponto')
     ->with('sessao',$Logado)//nome de usuario logado
     ->with('ErroDePonto',$request->ErroDePonto)
     ->with('M',$R);
   }

    public function Contador(Request $request){//ao clicar no botao da PaginaContador
    $ID=Funcionario::where('CPF',$request->CPF)->pluck('id')->first();//pelo CPF pegar o ID

     if($ID){

    $RS=
    Funcionario::find($ID);

     if($RS->Trabalhando===1){

    $TC=
    TempoChegada::
    where('funcionario_id',$ID)//Nao tem primary key,entao nao e possivel utilizar find
    ->pluck('Chegada')->first();

       //Necessario utilizar foreach 
         $TempoFeito=microtime(true)-$TC;
         $TempoFeito=$TempoFeito/60;//segundos para minutos
       
      
     
     $F=Funcionario::find($ID);
     $F->Trabalhando=0;//inverter status
     $F->HorarioFeitoNaSemana=$F->HorarioFeitoNaSemana+$TempoFeito;//incrementar tempo feito
     $F->save();

      $TC=TempoChegada:://impossivel guardar em array porque sera apagado quando controller ser finalizado
      where('funcionario_id',$ID);//Nao tem primary key,entao nao e possivel utilizar find
      $TC->delete();
      
    return response()->json(array('RS'=>$RS,'TempoFeito'=>round($TempoFeito,2))); 
     
    
     //$RP=new RegistroDePonto;$RP->funcionario_id=$ID;$RP->TempoFeito=$TempoFeito;

     }
     if($RS->Trabalhando===0){
       
      $F=Funcionario::find($ID);
      $F->Trabalhando=1;
      $F->save();

      $TC=new TempoChegada;//impossivel guardar em array porque sera apagado quando controller ser finalizado
      $TC->funcionario_id=$ID;
      $TC->Chegada=microtime(true);//microtime sao segundos atuais
      $TC->save();

      return response()->json(array('RS'=>$RS));

     }
    }if(!$ID){
      return response()->json(array('RS'=>"erro"));
     }
  

       //respondera um boolean
  }
 
  public function IndentificarFuncionarioLiberado(Request $request){
          $RS=
          DB::table('Funcionarios')
          ->select('id','nome','HorarioFeitoNaSemana')
          ->where('CPF',$request->CPF)->get();

          return response()->json(array('Professor'=>$RS));
  }

  
  public function LevatamentoDaSemana(Request $request){   
      $Dados=DB::table('funcionarios')->get() ;

      foreach ($Dados as $Coluna){
        $ID=$Coluna->id;
        $Atual=$Coluna->CargaHorariaAtual;
        $Fixa=$Coluna->CargaHorariaFixa;
        if ($Coluna->CargaHorariaAtual < $Coluna->CargaHorariaFixa){//Nao superou o horario devido
          
        $HorasDevendo=$Fixa-$Atual;
        DB::table('funcionarios')
        ->where('id',$ID)
        ->increment('HorasDevendo',$HorasDevendo)
        ->update('Devendo',true);

        }if ($Coluna->CargaHorariaAtual > $Coluna->CargaHorariaFixa){//Superou o horario devido
          $HorasAMais=$Atual-$Fixa;//valor acima do devido a ser feito por semana
          $HorasDevendo=DB::table('funcionarios')->select('HorasDevendo')->where('id',$ID);
          $HorasExtras=DB::table('funcionarios')->select('HorasExtras')->where('id',$ID);//Horas extras que devem ser feitas
          
          if ($Coluna->Devendo=true && $Coluna->Extra=true) { 
 
            if($HorasDevendo-$HorasAMais>0){//se horas a mais nao superou a divida
            DB::table('funcionarios')
            ->where('id',$ID)->decrement('HorasDevendo',$HorasAMais)->update('Devendo',true);//ira diminuir horas devendo
            
            }
            if($HorasDevendo-$HorasAMais<=0){//se horas a mais superou a divida
              //ira para horas extras
            if($HorasExtras+($HorasDevendo-$HorasAMais)<=0){ //o '+' por causa do valor negativo que vai ter entre parenteses

            DB::table('funcionarios')
            ->where('id',$ID)->update('HorasDevendo',0)->update('Devendo',false)//ira zerar divida
            ->update('HorasExtras',0)->update('Extra',false);//ira zerar horas extras

          } if($HorasExtras+($HorasDevendo-$HorasAMais)>0){//se o resto da superaçao da divida nao for suficiente para zerar
           
           DB::table('funcionarios')
           ->where('id',$ID)->update('HorasDevendo',0)->update('Devendo',false)//ira zerar divida
           ->decrement('HorasExtras',$HorasAMais)->update('Extra',true);//ira diminuir horas extras

          }
       }
         }if ($Coluna->Devendo=true && $Coluna->Extra=false){

          if($HorasAMais>0){
               DB::table('funcionarios')
               ->where('id',$ID)->decrement('HorasDevendo',$HorasAMais)->update('Devendo',true);
            }if($HorasAMais<=0){
              DB::table('funcionarios')
              ->where('id',$ID)->update('HorasDevendo',0)->update('Devendo',false);
          }
 
        }if ($Coluna->Devendo=false && $Coluna->Extra=true) {

          if($HorasExtras-$HorasAMais<=0){//se excedeu horas extras
            DB::table('funcionarios')
            ->where('id',$ID)
            ->update('HorasExtras',0)//ira zerar horas extras
            ->update('Extra',false);
          }if($HorasExtras-$HorasAMais>0){//se nao excedeu horas extras
           DB::table('funcionarios')
           ->where('id',$ID)
           ->decrement('HorasExtras',$HorasAMais)//ira diminuir horas extras
           ->update('Extra',true);

          }
        }
      }

}
  }

  public function ContadorSemAjax(Request $request){//ao clicar no botao da PaginaContador
    $ID=Funcionario::where('CPF',$request->CPF)->pluck('id')->first();//pelo CPF pegar o ID

     if($ID){

    $RS=
    Funcionario::find($ID);

     if($RS->Trabalhando===1){

    $TC=
    TempoChegada::
    where('funcionario_id',$ID)//Nao tem primary key,entao nao e possivel utilizar find
    ->pluck('Chegada')->first();

       //Necessario utilizar foreach 
         $TempoFeito=microtime(true)-$TC;
         $TempoFeito=$TempoFeito/60;//segundos para minutos
       
      
     
     $F=Funcionario::find($ID);
     $F->Trabalhando=0;//inverter status
     $F->HorarioFeitoNaSemana=$F->HorarioFeitoNaSemana+$TempoFeito;//incrementar tempo feito
     $F->save();

      $TC=TempoChegada:://impossivel guardar em array porque sera apagado quando controller ser finalizado
      where('funcionario_id',$ID);//Nao tem primary key,entao nao e possivel utilizar find
      $TC->delete();
      
      $F=Funcionario::find($ID)->select('HorarioFeitoNaSemana','id','nome');
      $RS[]="Saida liberada(Tempo feito: ".$TempoFeito." Minutos)";
      $RS[]="Para ".$F->nome." de ID ".$F->id;
      $RS[]="Total de minutos feitos na semana: ".$F->HorarioFeitoNaSemana;

    return redirect()->route('PaginaMarcarPonto')->with('RespostaDePonto',$RS); 
     
    
     //$RP=new RegistroDePonto;$RP->funcionario_id=$ID;$RP->TempoFeito=$TempoFeito;

     }
     if($RS->Trabalhando===0){
       
      $F=Funcionario::find($ID);
      $F->Trabalhando=1;
      $F->save();

      $TC=new TempoChegada;//impossivel guardar em array porque sera apagado quando controller ser finalizado
      $TC->funcionario_id=$ID;
      $TC->Chegada=microtime(true);//microtime sao segundos atuais
      $TC->save();

      $F=Funcionario::find($ID)->select('HorarioFeitoNaSemana','id','nome');
      $RS[]="Entrada liberada";
      $RS[]="Para ".$F->nome." de ID ".$F->id;
      $RS[]="Total de minutos feitos na semana: ".$F->HorarioFeitoNaSemana;
      return redirect()->route('PaginaMarcarPonto')->with('RespostaDePonto',$RS); 

     }
    }if(!$ID){
      return redirect()->route('PaginaMarcarPonto')->with('ErroDePonto',$RS); 
     }
  

       //respondera um boolean
  }
}
