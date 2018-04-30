
<!DOCTYPE html>
<html>
    <head><script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>

  <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
  <script src="{{ asset('assets/js/MeuJs/GerenciarProfessor.js') }}"></script>
  <style>
        img{
            width: 250px;
            height: 250px;  
        }
  </style>
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
          <a class="nav-link" href="{{ url('GerenciarCursos/Curso') }}">Gerenciar Cursos</a>
        </li>
       
      </ul>
    </div>
  </nav>
        <section class="Sessao">
<div>
    
            <table cellpadding="15">
                    <thead>
                        <tr>
                            <th><h4>Gerenciar dados de Professor </h4></th>
                            <th><button type="button" class="glyphicon glyphicon-edit" 
                              onclick="LiberarEdiçaoOuFecharEdiçao()">Habilitar ediçao</button></th>
                            <th><div id="image-holder" style="border-style: groove;width: 250px;height: 250px; margin-left:250px;"></div></th>
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
                            <td><p>CEP</p><input class="form-control" type="text" name="CEP" value="" id="MascaraCEP" style="width:200px;"/></td>
                            <td><p>Telefone</p><input class="form-control" type="text" name="CPF" value="" id="MascaraTelefone" style="width:200px;"/></td>
                            <td><h4 style="margin-left:50px;">Listar Materias do professor:</h4>
                                <div style="height:200px;overflow: auto;margin-left:50px;">
                                    
                            <table class="table table-striped" style="font-size:25px; ">
                                    <thead> 
                                        
                                      <tr>
                                        <th scope="col">Materia_id</th>
                                        <th scope="col">Nome materia</th>
                                        <th scope="col">Nome periodo</th>
                                        <th scope="col">Nome curso</th>
                                      </tr>
                                      
                                    </thead>
                                    <tbody>
                                     <div id="ListaDeMaterias">
                                      <tr>
                                      
                                        <th scope="row">1</th>
                                        <td>Nome da materia</td>
                                        <td>5º Periodo</td>
                                        <td>S.I.</td>
                                      
                                      </tr>
                                      <tr>
                                      
                                            <th scope="row">1</th>
                                            <td>Nome da materia</td>
                                            <td>5º Periodo</td>
                                            <td>S.I.</td>
                                          
                                          </tr><tr>
                                      
                                                <th scope="row">1</th>
                                                <td>Nome da materia</td>
                                                <td>5º Periodo</td>
                                                <td>S.I.</td>
                                              
                                              </tr><tr>
                                      
                                                    <th scope="row">1</th>
                                                    <td>Nome da materia</td>
                                                    <td>5º Periodo</td>
                                                    <td>S.I.</td>
                                                  
                                                  </tr><tr>
                                      
                                                        <th scope="row">1</th>
                                                        <td>Nome da materia</td>
                                                        <td>5º Periodo</td>
                                                        <td>S.I.</td>
                                                      
                                                      </tr><tr>
                                      
                                                            <th scope="row">1</th>
                                                            <td>Nome da materia</td>
                                                            <td>5º Periodo</td>
                                                            <td>S.I.</td>
                                                          
                                                          </tr>
                                      
                                    </div>
                                    </tbody>
                                  </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Carteira de trabalho</p>
                                <input class="form-control" type="text" name="CarteiraDeTrabalho" value="" id="CarteiraDeTrabalho" style="width:200px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td><div id="ModificarCargo" >
                                    <h5>Modificar cargo(Cargo atual:X)</h5>
                                        <p>Alterar Cargo do professor</p>
                                        <select id="Cargo" onchange="TrocarCargo()" class="form-control" >
                                            <option>Tempo Parcial</option>
                                            <option>Tempo Integral</option>]
                                            <option>Horista</option>
                                            </select>
                               
                                        </div>
                                    </td>
                            
                        </tr> 
                        <tr>
                        <td><div id="DivLucroHora" >
                            <p>Ganho por hora de trabalho</p>
                            <input class="form-control" type="text" name="Horas" value="" id="CampoHorasLucro" style="width:200px;"/></td>
                        </div>
                        <td>
                        </td>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <td><button type="button" class="btn btn-success" 
                            onclick="VerificarDados()">Atualizar</button></td>
                    </tr>
                     </tbody>
                </table> 
                        <div id="AdiçaoMateria" style="position:absolute;margin-right:50px;background-color:grey;top:1300px;">
                        
                            <h5>Adicionar materias</h5>
                            <p>Cursos da materia que deseja adicionar</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                            <option value="Curso">Selecione um curso</option>
                            </select>
                            <p>Periodo da materia que deseja adicionar</p>
                            <select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                            </select> 
                            <p>Adicionar Materia ao professor</p>
                            <select id="MateriaAdicionar" class="form-control">
                            <option>Selecione uma Materia</option>
                            </select><button type="button" class="btn btn-success" 
                            onclick="AdicionarMateria()">Adicionar materia</button>
                        </div>
             
                          <div id="Remover" style="position:absolute;left:31%;top:1525px;background-color:grey;">
                              <h5>Remover materia</h5>
                              <p>Remover Materia(s) que professor possui</p>
                            <select id="MateriaRemover" class="form-control">
                              <option>Selecione uma Materia</option>
                              </select><button type="button" class="btn btn-danger" 
                              onclick="RemoverMateria()">Remover materia</button>
                        
                    </div>
                </div>
        </section>
    </body>
</html>

<script>
    $("#MascaraCPF").mask("000.000.000-00");
    $("#MascaraCEP").mask("00000-000");
    $("#MascaraTelefone").mask("(00)00000-0000");
    $("#CarteiraDeTrabalho").mask("000.000.000-00");
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
        $('#Nome').attr('readonly', true);
        $('#CEP').attr('readonly', true);
        $('#CPF').attr('readonly', true);
        //$('#ModificarCargo').hide();
        //$('#Remover').hide();
        //$('#AdiçaoMateria').hide();
        $('#DivLucroHora').hide();

        </script>