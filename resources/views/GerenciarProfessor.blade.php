@extends('Templates/TemplateNavBar')


@section('conteudo')
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
                            <td> <p>Nome</p><input class="form-control" type="text" name="Nome" value="Ian" id="Nome"/></td>
                            <td><p>CPF</p><input class="form-control" type="text" name="CPF" value="111.111.111-11" id="CPF" style="width:200px;"/></td>
                            <td></br></br>
                                <div class="custom-file small" >
                                    <input type="file" class="custom-file-input" id="customFile" name="Imagem">
                                    <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg">Selecione imagem</label>
                                  </div></td>
                        </tr>
                        <tr>
                            <td><p>CEP</p><input class="form-control" type="text" name="CEP" value="11111-111" id="CEP" style="width:200px;"/></td>
                            <td><p>Telefone</p><input class="form-control" type="text" name="telefone" value="(00)0000-00000" id="Telefone" style="width:200px;"/></td>
                            <td><h4 style="margin-left:50px;">Lista de materias do professor:</h4>
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
                                         @for($i=0;$i<sizeOf($TabelaIDMateria);$i++)
                                      <tr>
                                           
                                        <th scope="row"> {{ $TabelaIDMateria[$i]->materia_id }}</th>
                                    
                                        <td>{{ $TabelaNomeMateria[$i][0] }}</td>
                                        
                                        <td>{{ $TabelaPeriodo[$i][0] }}</td>
                                        <td>{{ $TabelaCurso[$i][0] }}</td>
                                        
                                      </tr>
                                      @endfor
                                      
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
                        <div id="AdiçaoMateria" style="position:absolute;margin-right:50px;top:1300px;">
                        
                            <h5>Adicionar materias</h5>
                            <p>Cursos da materia que deseja adicionar</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                            <option value="Curso">Selecione um curso</option>
                            </select>
                            <p>Periodo da materia que deseja adicionar</p>
                            <select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                            <option>Selecione um Periodo</option>
                            </select> 
                            <p>Adicionar Materia ao professor</p>
                            <select id="MateriaAdicionar" class="form-control">
                            <option>Selecione uma Materia</option>
                            </select><button type="button" class="btn btn-success" 
                            onclick="AdicionarMateria()">Adicionar materia</button>
                        </div>
             
                          <div id="Remover" style="position:absolute;left:31%;top:1475px;">
                              <h5>Remover materia</h5>
                              <p>Remover Materia(s) que professor possui</p>
                            <select id="MateriaRemover" class="form-control">
                              <option>Selecione uma Materia</option>
                              </select><button type="button" class="btn btn-danger" 
                              onclick="RemoverMateria()">Remover materia</button>
                        
                    </div>
                </div>
<script>
    $("#MascaraCPF").mask("000.000.000-00");
    $("#MascaraCEP").mask("00000-000");
    $("#Telefone").mask("(00)00000-0000");
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
        $('#CarteiraDeTrabalho').attr('readonly', true);
        $('#Nome').attr('readonly', true);
        $('#CEP').attr('readonly', true);
        $('#CPF').attr('readonly', true);
        $('#Telefone').attr('readonly', true);

        //$('#ModificarCargo').hide();
        //$('#Remover').hide();
        //$('#AdiçaoMateria').hide();
        $('#DivLucroHora').hide();

        </script>

        @endsection