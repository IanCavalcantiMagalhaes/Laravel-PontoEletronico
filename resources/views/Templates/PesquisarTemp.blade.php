
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<!DOCTYPE html>
    <head>  <link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/MeuCss.css" rel="stylesheet">
     
<script src="js/Pesquisar.js"></script>
 

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Pesquisar</title>
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
        <script src="{{ asset('assets/js/MeuJs/Pesquisar.js') }}"></script>
    </head>
    <body class="TelaDeFundo" >
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Pesquisar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Marcar Ponto <span class="sr-only">(current)</span></a>
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
        <section class="Sessao">
        @yield('conteudo')

        </section>
<script> 
{{-- $("#Tabela").hide();   --}}
$("#Cargo").hide(); 
$("#Botao").hide(); 
</script>
   </body>
</html>
