<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CursoPeriodoMateriaAluno.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="GerenciarCursos/Curso">Gerenciar Cursos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('Pesquisar/Procurar') }}">Pesquisar<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('CadastrarProfessor/CadastroProfessor') }}">Cadastrar Professor</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Marcar Ponto</a>
        </li>
      </ul>
    </div>
  </nav>
<title>Gerencia de curso</title>

<link href="css/MeuCss.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CursoPeriodoMateriaAluno.js') }}"></script>
<style>
   
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
          }
          
          @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
          }
</style>
</head>
<body class="TelaDeFundo">
<section class="sessao">


 
  


                    <div>
                    <p>Escolha a açao que deseja fazer</p> 
                    
                         <input type="radio" name="EscolhidoComando" value="Editar" onclick="atualizar()"> Editar<br>
                         <input type="radio" name="EscolhidoComando" value="Adicionar"  onclick="atualizar()"> Adicionar<br>
                         <input type="radio" name="EscolhidoComando" value="Remover"  onclick="atualizar()"> Remover<br>  
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
                         <option>Selecione curso</option>
                         </select>
                      </div>

                      <div id="DivPeriodo">
               <p id="TextoPeriodo">Escolha um periodo</p>
                    <select id="Periodo" onchange="AoAlterarPeriodo()" >
                         <option>Selecione Periodo</option>
                         </select>
                        </div>

                        <div id="DivMateria">
                         <p id="TextoMateria">Escolha uma materia</p> 
                    <select id="Materia" onchange="MostrarEsconderCampoDeTexto()">
                         <option>Selecione Materia</option>
                         </select>
                        </div>
                        </br></br>
                        
                     <input type="text" value="" id="CampoDeTexto" 
                     style="position:absolute;width:400px;left:-100px;"></br></br>
                     <form action="{{route('GerenciarCursos')}}" method="get">
                      {{ csrf_field() }}
                     <button type="submit" class="btn btn-success" id="Botao" value="" style="position:absolute;margin:0 auto;">
                       <div id="TextoBotao"></div>
                     </button>
                    </form>
                        
                         
                    <div id="Turno" style="position:absolute;margin-left:500px;top:0px;">
                      <p>Escolha um turno</p>
                        <select name="turno">
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                        </select>
                        
                      </div>
                      <div id="DivInserirHorario" style="position:absolute;margin-left:480px;top:0px;">
                        <p>Diga o horario da aula</p>
                        <input type="text" value="" id="CampoHorario">

                        <p>Diga o dia da semana</p>
                        <select name="turno">
                        <option value="Segunda">Segunda</option>
                        <option value="Terça">Terça</option>
                        <option value="Quarta">Quarta</option>
                        <option value="Quinta">Quinta</option>
                        <option value="Sexta">Sexta</option>
                        </select>
                      </div>

                      <div class="alert alert-info" role="alert" style="position:relative;margin-left:400px;top:200px;">
                          <strong>OBSERVAÇÃO:</strong></br>Para Gerenciar professor (Ler,Alterar ou remover dados de professor)
                          será primeiro necessario procurar ele na pagina <a href="{{ url('Pesquisar/Procurar') }}">"Pesquisar"</a>
                        </div>
                    
                    
 <div class="loader" id="Carregando" style="position:absolute;left:50%;"></div>
</section>

</body>
</html>
 <script> 
 $('#CampoHorario').mask("00:00");
 $('#Carregando').hide();
 $('#Botao').hide();
 $('#Curso').hide();
 $('#Periodo').hide();
 $('#Materia').hide();
 $('#Aula').hide();
 $('#CampoDeTexto').hide();
 $('#DivInserirHorario').hide();
 $('#Turno').hide();
 $('#TextoCurso').hide();
 $('#TextoPeriodo').hide();
$('#TextoMateria').hide();
 </script>