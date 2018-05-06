
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
    
    <script src="js/CadastrarProfessor.js"></script>

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Marcar ponto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('Pesquisar/Procurar') }}">Pesquisar <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('CadastrarProfessor/CadastroProfessor') }}">Cadastrar Professor</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('GerenciarCursos/Curso') }}">Gerenciar Cursos</a>
            </li>
            
          </ul>
        </div>
      </nav>

    <section class="sessao">
        @yield('conteudo')
    </section>

</body>
</html>
<script>
$("#cpf").mask("000.000.000-00");
$("#Erro").hide();

$("#Saida").hide();
$("#Entrada").hide();
</script>
