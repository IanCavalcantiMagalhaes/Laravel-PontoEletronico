<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AulaIrregular extends Controller
{
        public function RetornarView(Request $request){
             
            return view('AulaIrregular',['IdProfessor'=>$request->id]);

        }
       public function VerificarPermissaoDefazerAulaIrregular(Request $request){
        
            
        
            $dataAtual=date('y/m/d');
        
            $DataDoBanco=Aula_irregular::where('funcionario_id',$request->ID)->latest()->first();//pegar ultima aula irregular feita por um professor especifico
            
                if($DataDoBanco->isNotEmpty()){//se registro anterior for existente
        
                    
                    $diferença=$dataAtual->diffInDays($DataDoBanco->data);
        
                        if($diferença>=7){//se foi a sete dias atras ou mais
                        //Liberar inserçao de aula irregular

                            return redirect()->route('PaginaAulaIrregular',
                                                      ['ID'=>$request->ID]);
                        }else{
                            return redirect()->route('Mostrar')
                            ->with('AlertaAulaIrregular',"Professor ja fez aula irregular a menos de 7 dias atras");
                        }
                    }
                        
            
                        
                    
       }
       public function AdicionarAulaIrregular(Request $request){
            //Liberar inserçao de aula irregular

            /*$Horas=$request->HoraASerAdicionada/1;
            $Minutos=$request->HoraASerAdicionada%1;
            $MinutosTotais=($Horas*60)+$Minutos;
             if($MinutosTotais<=240){//240 minutos ou 4 horas

            }
            OU
            Um select com valores fixos*/

            
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

     public function AdicionarAulaIrregularTEST(Request $request){//https://pt.stackoverflow.com/questions/151689/como-subtrair-datas-no-laravel
           //requests deste controller:HoraASerFeita(horas feitas pela aula irregular),ID(id funcionario),data_inserida(data que ocorrera aula irregular)
    
     
    
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
                        ->with('AlertaAulaIrregular',"Aula irregular registrada");
                    }else{
                        return redirect()->route('Mostrar')
                        ->with('AlertaAulaIrregular',"Professor ja fez aula irregular a menos de 7 dias atras");
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
    
       }
    }
