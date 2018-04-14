
<!DOCTYPE html>
<html>
    <head><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>
    </head>
    <body>
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
@endif
@endforeach

@if($Escolha="Somente ler")

      @foreach($TodosOsDadosProfessor as $Dados)
        <div class="row">
  <div class="col-md-4">
    <p><strong>ID do Professor</strong></p>
    <p>{{$Dados->id}}</p>
  </div>
  <div class="col-md-4">
    <p><strong>Nome do professor</strong></p>
    <p>{{$Dados->nome}}</p>
  </div>
  <div class="col-md-4">
    <p><strong>CPF do Professor</strong></p>
    <p>{{$Dados->cpf}}</p>
  </div>
</div> <!-- .row -->
@endforeach
@endif
<form action="DadosDoProfessorEditavel" style="position:relative;top: 50px;">
<input type="submit" value="Ir para editar clique aqui" />
</form>
    </body>
</html>
