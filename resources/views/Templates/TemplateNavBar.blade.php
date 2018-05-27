
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
    
    <script src="js/CadastrarProfessor.js"></script>



<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
@stack('DiretoriosJS')



@if($navbar=="Marcar Ponto")
<title>Marcar Ponto</title>
<script src="{{ asset('assets/js/MeuJs/MarcarPonto.js') }}"></script>

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
              <a class="nav-link" href="{{ url('GerenciarCursos/Pagina') }}">Gerenciar Cursos</a>
            </li>
            <li class="nav-item active" >
              <a class="nav-link" href="{{ url('Logout') }}" style="position:absolute;left:90%;">Logout({{ $sessao }})</a>
            </li>
          </ul>
        </div>
      </nav>
@endif

@if($navbar=="Pesquisar")
<title>Pesquisar</title>

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
                  <a class="nav-link" href="{{ url('GerenciarCursos/Pagina') }}">Gerenciar Cursos</a>
                </li>
                <li class="nav-item active" >
                  <a class="nav-link" href="{{ url('Logout') }}" style="position:absolute;left:95%;">Logout</a>
                </li>
              </ul>
            </div>
          </nav>
@endif

@if($navbar=="Cadastrar Professor")
<title>Cadastrar Professor</title>

<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>


</head>
<body class="TelaDeFundo" >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Cadastrar Professor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('Pesquisar/Procurar') }}">Pesquisar <span class="sr-only">Pesquisar</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Marcar Ponto</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('GerenciarCursos/Pagina') }}">Gerenciar Cursos</a>
        </li>
        <li class="nav-item active" >
          <a class="nav-link" href="{{ url('/Logout') }}" style="position:absolute;left:95%;">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
@endif
@if($navbar=="Gerenciar Cursos")
<title>Gerenciar Cursos</title>
<script src="{{ asset('assets/js/MeuJs/GerenciarCursos.js') }}"></script>
</head>

<body class="TelaDeFundo" >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="GerenciarCursos/Pagina">Gerenciar Cursos</a>
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
      <li class="nav-item active" >
        <a class="nav-link" href="{{ url('/Logout') }}" style="position:absolute;left:95%;">Logout</a>
      </li>
    </ul>
  </div>
</nav>
@endif
@if($navbar=="Gerenciar Professor")
<title>Gerenciar Professor</title>
<script src="{{ asset('assets/js/MeuJs/GerenciarProfessor.js') }}"></script>
</head>

<body class="TelaDeFundo">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Gerenciar Professor</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('Pesquisar/Procurar') }}">Pesquisar <span class="sr-only">Pesquisar</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Marcar Ponto</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('GerenciarCursos/Pagina') }}">Gerenciar Cursos</a>
    </li>
    <li class="nav-item active" >
      <a class="nav-link" href="{{ url('/Logout') }}" style="position:absolute;left:95%;">Logout</a>
    </li>
  </ul>
</div>
</nav>

@endif
    <section class="sessao">

@yield('conteudo')
 
</section>