<?php

namespace App\Http\Controllers;
use App\Models\Aula_Irregular;
use Illuminate\Http\Request;


class AulaIrregular extends Controller
{
        public function RetornarView(Request $request){//PaginaAulaIrregular
             
            return view('AulaIrregular',['IdProfessor'=>$request->id])->with('navbar',"Gerenciar Professor");

        }
       public function VerificarPermissaoDefazerAulaIrregular(Request $request){
        
        
            
                $dataAtual=date('y/m/d');
            
                $DataDoBanco=Aula_Irregular::
                  where('funcionario_id',$request->ID)->latest()->first();//pegar ultima aula irregular feita por um professor especifico
                
                    if($DataDoBanco){//se registro anterior for existente
            
                        
                        $diferença=$dataAtual->diffInDays($DataDoBanco->data);
            
                            if($diferença>=7){//se foi a sete dias atras ou mais
                            //Liberar inserçao de aula irregular

                            return redirect()->action('AulaIrregular@RetornarView',['id'=>$request->ID]);//liberar acesso de pagina de aula irregular
                                                        
                            }else{
                                return redirect()->route('Mostrar',
                                ['ID'=>$request->ID])->with('AlertaAulaIrregularNegado',"Professor ja fez aula irregular a menos de 7 dias atras");
                            }
                        }else{
                            return redirect()->action('AulaIrregular@RetornarView',['id'=>$request->ID]);//liberar acesso de pagina de aula irregular
                                                        

                        }
            
                
                            
                        
        }
       public function AdicionarAulaIrregular(Request $request){http://php.net/manual/pt_BR/function.split.php http://php.net/manual/pt_BR/function.intval.php
            //Liberar inserçao de aula irregular

            /*$Horas=$request->HoraASerAdicionada/1;
            $Minutos=$request->HoraASerAdicionada%1;
            $MinutosTotais=($Horas*60)+$Minutos;
             if($MinutosTotais<=240){//240 minutos ou 4 horas

            }
            OU
            Um select com valores fixos*/
    list ($horas, $minutos) = split ('[:]', $request->Horas);
    $HoraASerAdicionada=intval($minutos)+(intval($horas)*60);

        if($HoraASerAdicionada<=240){//se for menor ou igual a 4 horas(240 minutos) sera liberado
            
            $F=Funcionario::find($request->ID);
            $F->HorarioFeitoNaSemana=$F->HorarioFeitoNaSemana+$HoraASerAdicionada;
            $F->save();//incrementar valor

            $AI=new Aula_irregular;
            $AI->id_funcionario=$request->ID;
            $AI->data=$request->data_inserida;//
            $AI->save();

            return redirect()->route('Mostrar',
            ['ID'=>$request->ID])->with('AlertaAulaIrregularAdicionada',"Aula irregular registrada");
        }else{
            return redirect()->route('PaginaAulaIrregular',
            ['ID'=>$request->ID])->with('AlertaAulaIrregularInvalido',"Horario invalido:deve ser igual ou menor que 4 horas");
       }
    }

    }
