
<!DOCTYPE html>
<html>
    <head><script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        
<script src="{{ asset('assets/js/MeuJs/.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
  
    </head>
    <body class="TelaDeFundo"><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
          <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">MarcarPonto</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('GerenciarCursos/Curso') }}">Gerenciar Cursos</a>
        </li>
       
      </ul>
    </div>
  </nav>
        <section class="Sessao">

    
            <table cellpadding="50" border="1">
                    <thead>
                        <tr>
                            <th><h4>Gerenciar dados de Professor </h4></th>
                            <th><button type="button" class="glyphicon glyphicon-edit" 
                              onclick="LiberarEdiçaoOuFecharEdiçao()">Habilitar ediçao</button></th>
                            <th><div id="image-holder"></div></th>
                        </tr>
                    </thead>
                    
                    
                    
                 
                    <tbody>
                        <tr>
                            <td> <p>Nome</p><input class="form-control" type="text" name="Nome" value="" /></td>
                            <td><p>CPF</p><input class="form-control" type="text" name="CPF" value="" id="MascaraCPF" style="width:200px;"/></td>
                            <td></br></br>
                                <div class="custom-file small" >
                                    <input type="file" class="custom-file-input" id="customFile" name="Imagem">
                                    <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg">Selecione imagem</label>
                                  </div></td>
                        </tr>
                        <tr>
                            <td><p>CEP</p><input class="form-control" type="text" name="CPF" value="" id="MascaraCEP" style="width:200px;"/></td>
                            <td><p>Telefone</p><input class="form-control" type="text" name="CPF" value="" id="MascaraTelefone" style="width:200px;"/></td>
                            <td><h4>Listar Materias do professor</h4>
                            <div id="ListaDeMaterias"></div>
                            <table class="table table-dark">
                                    <thead>
                                      <tr>
                                        <th scope="col">Materia_id</th>
                                        <th scope="col">Nome materia</th>
                                        <th scope="col">Nome periodo</th>
                                        <th scope="col">Nome curso</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     @foreach()
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </td>
                            
                        
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            
                        </tr> 
                        
                        <tr>
                        <td>
                            <h4>Adicionar materias</h4>
                            <p>Cursos da materia que deseja adicionar</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                            <option value="Selecionar">Selecione um curso</option>
                            {{--  
                                @foreach ($Cursos as $Curso){ 
                               <option value="{{ $Curso->id }} "> "{{ $Curso->nomeCurso }}" </option>
                                @endforeach --}}
                            </select></td>
                            <td><h4>Modificar cargo(Cargo atual:X)</h4>
                                <p>Alterar Cargo do professor</p><select id="Cargo" class="form-control">
                                    <option>Selecione algum cargo</option>
                                    <option>Horista</option>
                                    <option>Tempo Parcial</option>
                                    <option>Tempo Integral</option>
                                    </select></td>
                        </tr> 

                        <tr>
                        <td><p>Periodo da materia que deseja adicionar</p><select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                            </select></td>
                        </tr>
                        <tr>
                        <td><p>Adicionar Materia ao professor</p>
                          <select id="Materia" class="form-control">
                            <option>Selecione uma Materia</option>
                            </select><button type="button" class="btn btn-success" 
                            onclick="AdicionarMateria()">Adicionar materia</button>
                          </td>
                          <td><h4>Remover materia</h4>
                              <p>Remover Materia(s) que professor possui</p>
                            <select id="Materia" class="form-control">
                              <option>Selecione uma Materia</option>
                              </select><button type="button" class="btn btn-danger" 
                              onclick="RemoverMateria()">Remover materia</button>
                            </td>
                        </tr>
                       
                       
                    </tbody>
                </table>
             
        
        </section>
    </body>
</html>

<script>
    $("#MascaraCPF").mask("000.000.000-00");
    $("#MascaraCEP").mask("00000-000");
    $("#MascaraTelefone").mask("(00)00000-0000");
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
        $('#campoNome').attr('readonly', true);
        $('#campoCEP').attr('readonly', true);
        $('#campoCPF').attr('readonly', true);
        </script>