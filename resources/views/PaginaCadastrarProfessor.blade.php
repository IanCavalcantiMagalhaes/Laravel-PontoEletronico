
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
 <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="nav-link" href="{{ url('GerenciarCursos/Curso') }}">Gerenciar Cursos</a>
        </li>
       
      </ul>
    </div>
  </nav>
<title>Adicionar produto a lista</title>




<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>
<style>img{
        width: 250px;
        height: 250px;  

    }
    .LinhaVertical{
        border-left: 6px solid green;
    height: 500px;
    }
</style>
</head>
<body class="TelaDeFundo">
<section class="Sessao">

        <form action="{{route('InserirProfessor')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
    <table cellpadding="15">
            <thead>
                <tr>
                    <th><h2>Cadastro Professor </h2></th>
                    <th></th>
                    <th><div id="image-holder" style="border-style: groove;width: 250px;
                        height: 250px; "></div></th>
                </tr>
            </thead>
            
            
            
         
            <tbody>
                <tr>
                    <td> <p>Nome</p><input class="form-control" type="text" name="Nome" value="" /></td>
                    <td><p>CPF</p><input class="form-control" type="text" name="CPF" value="" id="MascaraCPF" style="width:200px;"/></td>
                    <td></br></br>
                        <div class="custom-file small" >
                            <input type="file" class="custom-file-input" id="customFile"accept="image/png, image/jpeg" name="image">
                            <label class="custom-file-label" for="customFile" >Selecione imagem</label>
                          </div></td>
                </tr>
                <tr>
                    <td><p>CEP</p><input class="form-control" type="text" name="CEP" value="" id="CEP" style="width:200px;"/></td>
                    <td><p>Telefone</p><input class="form-control" type="text" name="Telefone" value="" id="Telefone" style="width:200px;"/></td>
                    
                    
                
                </tr>
                <tr>
                    <td><p>Carteira de trabalho</p><input class="form-control" type="text" name="CarteiraDeTrabalho" value="" id="CarteiraDeTrabalho" style="width:200px;"/></td>
                    <td></td>
                    
                </tr> 
                
                <tr>
                <td><p>Cursos</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                    <option value="Selecionar">Selecione um curso</option>
                    {{--  
                        @foreach ($Cursos as $Curso){ 
                       <option value="{{ $Curso->id }} "> "{{ $Curso->nomeCurso }}" </option>
                        @endforeach --}}
                    </select></td>
                    <td><p>Cargos</p><select id="Cargo" class="form-control">
                            <option>Selecione algum cargo</option>
                            <option>Horista</option>
                            <option>Tempo Parcial</option>
                            <option>Tempo Integral</option>
                            </select></td>
                </tr> 
                <tr>
                <td><p>Periodo</p><select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                    </select></td>
                </tr>
                <tr>
                <td><p>Materia</p><select id="Materia" class="form-control">
                    <option>Selecione uma Materia</option>
                    </select></td>
                </tr>
               
               
            </tbody>
        </table>
     
       
       <button type="submit" class="btn btn-success" onclick="VerificarDadosCadastraisAJax()">Cadastrar</button>
 </form>


</section>

</body>
</html>

<script>
       
        $("#customFile").on('change', function () {
          http://matheuspiscioneri.com.br/blog/preview-de-imagem-antes-do-upload-filereader/
         // Matheus Piscioneri /Acessado:15 de abril de 2018
            if (typeof (FileReader) != "undefined") {
         
                var image_holder = $("#image-holder");
                image_holder.empty();
                
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                        
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else{
                alert("Este navegador nao suporta FileReader.");
            }
            $("html").css('height', '100%');
            $("body").css('height', '100%');
            
            
        });
        $("#CEP").mask("99.999-999");
        $('#CPF').mask('000.000.000-00');
        $('#Telefone').mask('(00) 0000-00000');
        $('#CarteiraDeTrabalho').mask('000.000.000-00');
        </script>