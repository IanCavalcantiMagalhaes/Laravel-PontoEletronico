@extends('Templates/TemplateNavbar')


@section('conteudo')


                    <div>
                    <p>Escolha a açao que deseja fazer</p> 
                    
                         <input type="radio" name="EscolhidoComando" class="EscolhidoComando" value="Editar" onclick="atualizar()"> Editar<br>
                         <input type="radio" name="EscolhidoComando" class="EscolhidoComando" value="Adicionar"  onclick="atualizar()"> Adicionar<br>
                         <input type="radio" name="EscolhidoComando" class="EscolhidoComando" value="Remover"  onclick="atualizar()"> Remover<br>  
                    <p>Escolha o tipo de dado</p> 

                    <select id="Escolhido" onchange="atualizar()">
                        <option>Selecione</option>
                        <option value="Curso">Curso</option>
                        <option value="Periodo">Periodo</option>
                        <option value="Materia">Materia</option>
                        <option value="Aula">Aula</option>
                        </select>
                    </div>
                      <div style="position:absolute;left:45%;top:0px;">
                     <div id="DivCurso">
                    <p id="TextoCurso">Escolha um curso</p>
                    <select id="Curso" onchange="AoAlterarCurso()">
                         </select>
                      </div>

                      <div id="DivPeriodo">
               <p id="TextoPeriodo">Escolha um periodo</p>
                    <select id="Periodo" onchange="AoAlterarPeriodo()" >
                         </select>
                        </div>

                        <div id="DivMateria">
                         <p id="TextoMateria">Escolha uma materia</p> 
                    <select id="Materia" onchange="MostrarEsconderCampoDeTexto()">
                         </select>
                        </div>
                        <div id="DivAula">
                          <p id="TextoAula">Escolha uma materia</p> 
                     <select id="Aula" onchange="MostrarEsconderCampoDeTexto()">
                          </select>
                         </div>
                        </br></br>
                        
                     <input type="text" value="" id="CampoDeTexto" name="CampoDeTexto"
                     style="position:absolute;width:400px;left:-100px;"></br></br>
                      {{ csrf_field() }}
                     <button type="submit" class="btn btn-success" id="Botao" onclick="BotaoExecutarClicado()" value="" style="position:absolute;margin:0 auto;">
                       <div id="TextoBotao"></div>
                     </button>
                   
                        
                         
                    <div id="DivTurno" style="position:absolute;margin-left:500px;top:0px;">
                      <p>Escolha um turno <a id="TurnoAtual"></a></p>
                        <select name="turno" id="Turno">
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                        </select>
                        
                      </div>
                      <div id="DivInserirHorario" style="position:absolute;margin-left:480px;top:0px;">
                        <p>Diga o horario da aula</p>
                        <input type="text" value="" id="CampoHorario">

                        <p>Diga o dia da semana(<a id="DivDiaAtual"></a>)</p>
                        <select name="Dia" id="Dia">
                        <option value="Segunda">Segunda</option>
                        <option value="Terça">Terça</option>
                        <option value="Quarta">Quarta</option>
                        <option value="Quinta">Quinta</option>
                        <option value="Sexta">Sexta</option>
                        </select>
                      </div>
                      <div id="DivSala" style="position:absolute;margin-left:480px;top:0px;">
                      <p>Diga o numero da sala</p>
                      <input type="text" value="" id="Sala">
                      </div>
                      <div class="alert alert-info" role="alert" style="position:relative;margin-left:400px;top:200px;">
                          <strong>OBSERVAÇÃO:</strong></br>Para Gerenciar professor (Ler,Alterar ou remover dados de professor)
                          será primeiro necessario procurar ele na pagina <a href="{{ url('Pesquisar/Procurar') }}">"Pesquisar"</a>
                        </div>
                    
                    
 <div class="loader" id="Carregando" style="position:absolute;left:50%;"></div>

 <script> 
 $('#CampoHorario').mask("00:00");
 $('#Carregando').hide();

 $('#Botao').hide();
 $('#Aula').hide();
 $('#CampoDeTexto').hide();
 

$('#DivCurso').hide();
$('#DivTurno').hide();

$('#DivPeriodo').hide();
$('#DivSala').hide();
$('#Sala').val('');

$('#DivMateria').hide();

$('#DivAula').hide();
$('#DivInserirHorario').hide();

 </script>
 @endsection