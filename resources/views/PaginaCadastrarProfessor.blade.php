
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
 <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CadastrarProfessor.js"></script>
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



<script>$("#MascaraCPF").mask("000.000.000-00");
        $("#MascaraCEP").mask("00000-000");
        $("#MascaraTelefone").mask("(00)00000-0000");
</script>
<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>
</head>
<body class="TelaDeFundo">
<section class="sessao">

    <form action="Inexistente">
    <table cellpadding="10">
            <thead>
                <tr>
                    <th><p>Nome produto </p></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <p>Nome</p><input type="text" name="Nome" value="" /></td>
                    <td><p>CPF</p><input type="text" name="CPF" value="" id="MascaraCPF"/></td>
                    <td><p>Telefone</p><input type="text" name="CPF" value="" id="MascaraTelefone"/></td>
                </tr>
                <tr>
                    <td><p>CEP</p><input type="text" name="CPF" value="" id="MascaraCEP"/></td>
                    <td><p>Cargos</p><select id="Cargo">
                    <option>Selecione algum cargo</option>
                    <option>Horista</option>
                    <option>Tempo Parcial</option>
                    <option>Tempo Integral</option>
                    </select></td>
                    <td></td>
                
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                
                <tr>
                <td><p>Cursos</p><select id="Curso" onchange="AoAlterarCurso()">
                    <option value="Selecionar">Selecione um curso</option>
                    <?php foreach ($Cursos as $Curso){        ?>
                    <option value="<?php echo $Curso->id ?>"><?php echo $Curso->nomeCurso ?></option>
                    <?php }?>
                    </select></td>
                </tr> 
                <tr>
                <td><p>Periodo</p><select id="Periodo" onchange="AoAlterarPeriodo()">
                    <option>Selecione um Periodo</option>
                    </select></td>
                </tr>
                <tr>
                <td><p>Materia</p><select id="Materia">
                    <option>Selecione uma Materia</option>
                    </select></td>
                </tr>
               
               
            </tbody>
        </table>
     
   
        <button type="submit" class="btn btn-success" onclick="VerificarDadosCadastraisAJax()">Success</button>
 </form>


</section>

</body>
</html>