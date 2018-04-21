
<!DOCTYPE html>
<html>
    <head><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>
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
    </head>
    <body>
      /*
      @if($Escolha="Editar ou remover")
      @foreach($TodosOsDadosProfessor as $Dados)
        <div class="row">
 <div class="form-group col-md-4">
   <label for="campo1">Campo Um</label>
   <input type="text" class="form-control" id="campo1">
 </div>
 
 <div class="form-group col-md-4">
   <label for="campo2">Campo Dois</label>
   <input type="text" class="form-control" id="campo3">
 </div>
 
 <div class="form-group col-md-4">
   <label for="campo3">Campo Três</label>
   <input type="text" class="form-control" id="campo3">
 </div>
</div>

@endforeach*/

//@if($Escolha="Somente ler")

    //  @foreach($TodosOsDadosProfessor as $Dados)
        <div class="row">
  <div class="col-md-4">
    <p><strong>ID do Professor</strong></p>
   // <p>{{$Dados->id}}</p>
   <p>1 </p>
  </div>
  <div class="col-md-4">
    <p><strong>Nome do professor</strong></p>
    //<p>{{$Dados->nome}}</p>
    <p>Nome</p>
  </div>
  <div class="col-md-4">
    <p><strong>CPF do Professor</strong></p>
   // <p>{{$Dados->cpf}}</p>
   <p>111.111.111-11</p>
  </div>
</div> 
//@endforeach
//@endif

    </body>
</html>