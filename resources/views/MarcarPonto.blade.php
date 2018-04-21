
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
 <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CadastrarProfessor.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Registro de ponto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Pesquisar Professor <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cadastrar Professor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gerenciar Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Pesquisar Cursos,Periodos e Materias</a>
        </li>
      </ul>
    </div>
  </nav>
<title>Adicionar produto a lista</title>


<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/MarcarPonto.js') }}"></script>
<style>
.AjustarAlertas{
   top:100px;
}.AjustarCampoEBotao{
  position: relative;
  top:50px;
}
</style>
</head>
<body class="TelaDeFundo">
<section class="sessao">
 
 <div class="AjustarCampoEBotao">
  <input type="text" name="CPF" id="cpf" class="form-control" 
  placeholder="Digite CPF" style="margin:0 auto;width:25%;">
  <div class="col-sm-12 text-center" style="top:10px;">
  <button type="button" onclick="AnaliseTest()" class="btn btn-primary center-block" >Marcar Ponto</button>
  </div>
 </div>


  
  <div>
  <div class="alert alert-success" class="AjustarAlertas" role="alert" id="Entrada" style="top:100px;">
  <h4 class="alert-heading">Entrada liberada</h4>
  <p id="Indentificaçao">Entrada permitida para </p>
  <hr>
  <p class="mb-0">Somente pelo banco ira indentificar professores(INEXISTENTE BANCO DE DADOS POR ENQUANTO)</p>
     </div>

     <div class="alert alert-success" class="AjustarAlertas" role="alert" id="Saida" style="top:100px;">
        <h4 class="alert-heading">Saida liberada </h4>
        <p id="Indentificaçao"></p>
        <hr>
        <p class="mb-0">Somente pelo banco ira indentificar professores(INEXISTENTE BANCO DE DADOS POR ENQUANTO)</p>
           </div>


<div class="alert alert-danger" class="AjustarAlertas" role="alert" id="Erro" style="top:100px;">
  <h4 class="alert-heading">Falha no registro</h4>
  <p>CPF nao reconhecido pelo sistema</p>
  <hr>
  <p class="mb-0">Somente pelo banco ira indentificar professores(INEXISTENTE BANCO DE DADOS POR ENQUANTO)</p>
</div>

</section>

</body>
</html>
<script>
$("#cpf").mask("000.000.000-00");
$("#Erro").hide();
$("#Saida").hide();
$("#Entrada").hide();
</script>
