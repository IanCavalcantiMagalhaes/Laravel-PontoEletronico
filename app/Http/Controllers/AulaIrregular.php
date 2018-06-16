<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AulaIrregular extends Controller
{
       public function AdicionarAulaIrregular(Request $request){//https://pt.stackoverflow.com/questions/151689/como-subtrair-datas-no-laravel
           //requests deste controller:HoraASerFeita(horas feitas pela aula irregular),ID(id funcionario),data_inserida(data que ocorrera aula irregular)
    
        $date1 = Carbon::createFromFormat('Y-m-d', '1999-01-01');
        $date2 = Carbon::createFromFormat('Y-m-d', '2000-01-01');
        
        $value = $date2->diffInDays($date1); // saída: 365 dias
    
        
    
        $dataAtual=date('y/m/d');
    
        $DataDoBanco=Aula_irregular::where('funcionario_id',$request->ID)->latest()->first();//pegar ultima aula irregular feita por um professor especifico
        
            if($DataDoBanco->isNotEmpty()){//se registro anterior for existente
    
                
                $diferença=$dataAtual->diffInDays($DataDoBanco->data);
    
                    if($diferença>=7){//se foi a sete dias atras ou mais
                    //Liberar inserçao de aula irregular
                        $F=Funcionario::find($request->ID);
                        $F->HorarioFeitoNaSemana=$F->HorarioFeitoNaSemana+$request->HoraASerAdicionada;
                        $F->save();//incrementar valor
    
                        $AI=new Aula_irregular;
                        $AI->id_funcionario=$request->ID;
                        $AI->data=$request->data_inserida;//
                        $AI->save();
    
                        return redirect()->route('PaginaMarcarPonto')
                        ->with('Alerta',"Aula irregular registrada");
                    }else{
                        return redirect()->route('PaginaAulaIrregular')
                        ->with('Alerta',"Professor ja fez aula irregular a menos de 7 dias atras");
                    }
    
            }else{
                //Liberar inserçao de aula irregular
                $F=Funcionario::find($request->ID);
                $F->HorarioFeitoNaSemana=$F->HorarioFeitoNaSemana+$request->HoraASerAdicionada;
                $F->save();//incrementar valor
    
                $AI=new Aula_irregular;
                $AI->id_funcionario=$request->ID;
                $AI->data=$request->data_inserida;//
                $AI->save();
    
                return redirect()->route('PaginaMarcarPonto')
                ->with('Alerta',"Aula irregular registrada");
            }
    
       }public function ProcurarProfessor(Request $request){
           $F=Funcionario::
           where('nome',"LIKE",'%'.$request->search.'%')
           ->get();
           
           if($F->isNotEmpty()){
              return response()->json(array('RS'=>$F));
           }else{
            return response()->json(false);
           }
           
    
       }public function RetornarView(){
           $Func=Funcionario::all();
    
           return view("AulaIrregular")->with('navbar',"Gerenciar Professor")->with('Professor',$Func);
       }
    
    }
