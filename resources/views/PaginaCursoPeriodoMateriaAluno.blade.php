<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CursoPeriodoMateriaAluno.js"></script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Gerenciar Cursos</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
        <div class="col-sm-3 col-md-3 pull-right">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>
  </div>
</nav>
<title>Adicionar produto a lista</title>

<link href="css/MeuCss.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CursoPeriodoMateriaAluno.js') }}"></script>
</head>
<body class="TelaDeFundo">
<section class="sessao">

    <form action="Inexistente">
 
  


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
                    <td><p id="TextoPerido">Escolha um periodo</p>
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
                    <td> <input type="text" value="" id="CampoDeTexto">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
     
        <button type="submit" class="btn btn-success" id="Botao" value="Executar">Executar</button>
 </form>


</section>

</body>
</html>
 <script> 
     
$('#TextoCurso').hide();
$('#TextoPerido').hide();
$('#TextoMateria').hide();
 $('#Curso').hide();
 $('#Periodo').hide();
 $('#Materia').hide();
 $('#Aula').hide();
 $('#CampoDeTexto').hide();
 $('#InserirHorario').hide();
 $('#Turno').hide();
 </script>