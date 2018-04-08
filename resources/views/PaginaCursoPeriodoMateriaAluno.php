<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CursoPeriodoMateriaAluno.js"></script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
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

</head>
<body class="TelaDeFundo">
<section class="sessao">

    <form action="Inexistente">
 
  


  <table cellpadding="10">
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
                    
                         <input type="radio" name="EscolhidoComando" value="Editar"> Editar<br>
                         <input type="radio" name="EscolhidoComando" value="Adicionar"> Adicionar<br>
                         <input type="radio" name="EscolhidoComando" value="Remover"> Remover<br>  
                    </td>
                    <td> <select id="Curso" onchange="AoAlterarCurso()">
                         <option>Selecione curso</option>
                         </select>
                    </td>
                    <td></td>
                </tr>
                 <tr>
                    <td><p>Escolha o tipo de dado</p> 
                    <select id="Escolhido" onchange="AlterarCursoPeriodoMateriaAula()">
                        <option>Selecione</option>
                        <option value="Curso">Curso</option>
                        <option value="Periodo">Periodo</option>
                        <option value="Materia">Materia</option>
                        <option value="Aula">Aula</option>
                        </select>
                    </td>
                    <td> <select id="Periodo" onchange="AoAlterarPeriodo()" >
                         <option>Selecione Periodo</option>
                         </select>
                    </td>
                    <td></td>
                
                </tr>
                <tr>
                    <td></td>
                    <td> <select id="Materia" onchange="MostrarEsconderCampoDeTexto()">
                         <option>Selecione Materia</option>
                         </select>
                    </td>
                    <td></td>
                </tr> 
                <tr>
                    <td></td>
                    <td> <select id="Aula" onchange="MostrarEsconderCampoDeTexto()">
                         <option>Selecione Aula</option>
                         </select>
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
     
        <button type="button" class="btn btn-danger" onclick="test()">Danger</button>
        <button type="submit" class="btn btn-success" onclick="VerificarDadosCadastraisAJax()" >Success</button>
 </form>


</section>

</body>
</html>
<script>
 function test(){
     alert($("input[name='EscolhidoComando']:checked").val());
 }
 </script>
 <script> 
     

 $('#Curso').hide();
 $('#Periodo').hide();
 $('#Materia').hide();
 $('#Aula').hide();
 $('#CampoDeTexto').hide();
 </script>