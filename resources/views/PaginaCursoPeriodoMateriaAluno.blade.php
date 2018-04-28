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
          <a class="nav-link" href="{{ url('Pesquisar/Procurar') }}">Pesquisar Professor <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('CadastrarProfessor/CadastroProfessor') }}">Cadastrar Professor</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Registro de ponto</a>
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


 
  


  <table cellpadding="15">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>Escolha a açao que deseja fazer</p> 
                    
                         <input type="radio" name="EscolhidoComando" value="Editar" onclick="atualizar()"> Editar<br>
                         <input type="radio" name="EscolhidoComando" value="Adicionar"  onclick="atualizar()"> Adicionar<br>
                         <input type="radio" name="EscolhidoComando" value="Remover"  onclick="atualizar()"> Remover<br>  
                    </td>
                    <td> <p id="TextoCurso">Escolha um curso</p>
                    <select id="Curso" onchange="AoAlterarCurso()">
                         <option>Selecione curso</option>
                         </select><div>
                    </td>
                    <td></td>
                </tr>
                 <tr>
                    <td><p>Escolha o tipo de dado</p> 
                    <select id="Escolhido" onchange="atualizar()">
                        <option>Selecione</option>
                        <option value="Curso">Curso</option>
                        <option value="Periodo">Periodo</option>
                        <option value="Materia">Materia</option>
                        <option value="Aula">Aula</option>
                        </select>
                    </td>
                    <td><p id="TextoPeriodo">Escolha um periodo</p>
                    <select id="Periodo" onchange="AoAlterarPeriodo()" >
                         <option>Selecione Periodo</option>
                         </select>
                    </td>
                    <td><div id="Turno"><p>Escolha um turno</p>
                        <select name="turno">
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                        </select></div>
                   </td>
                
                </tr>
                <tr>
                    <td></td>
                    <td><p id="TextoMateria">Escolha uma materia</p> 
                    <select id="Materia" onchange="MostrarEsconderCampoDeTexto()">
                         <option>Selecione Materia</option>
                         </select>
                    </td>
                    <td><input type="text" value="" id="InserirHorario"></td>
                </tr> 
                <tr>
                    <td></td>
                    <td> 
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="text" value="" id="CampoDeTexto" style="width:500px;">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
     
        <button type="submit" class="btn btn-success" id="Botao" value="" style="position:absolute;left:50%;"><div id="TextoBotao"></div></button>
    </br></br></br></br>
 <div class="loader" id="Carregando" style="position:absolute;left:50%;"></div>
</section>

</body>
</html>
 <script> 
     
 $('#Carregando').hide();
 //$('#Botao').hide();
 $('#Curso').hide();
 $('#Periodo').hide();
 $('#Materia').hide();
 $('#Aula').hide();
 $('#CampoDeTexto').hide();
 $('#InserirHorario').hide();
 $('#Turno').hide();
 $('#TextoCurso').hide();
 $('#TextoPeriodo').hide();
$('#TextoMateria').hide();
 </script>