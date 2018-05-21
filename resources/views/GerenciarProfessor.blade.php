@extends('Templates/TemplateNavBar')


@section('conteudo')
        <section class="Sessao">
            <form action="{{ route('AtualizarProfessor') }}">
            <table cellpadding="30" >
                    <thead>
                        <tr>
                            <th><h3>Gerenciar dados de Professor(ID:<div id="ID">{{ $TabelaFuncionario->id }}</div>) </h3></th>
                            <input class="form-control" type="hidden" name="ID"  value={{ $TabelaFuncionario->id }} />
                            <th><button type="button" class="btn btn-success"
                              onclick="Ediçao()" id="EdiçaoBotao"></button></th>
                            <th><div id="image-holder"></div></th>
                        </tr>
                    </thead>
                    
                    
                    
                 
                    <tbody>
                        <tr>
                            <td> <p>Nome</p><input class="form-control" type="text" name="Nome" id="campoNome" value={{ $TabelaFuncionario->nome }} /></td>
                            <td><p>CPF</p><input class="form-control" type="text" name="CPF" id="campoCPF" value={{ $TabelaFuncionario->CPF }}  style="width:200px;"/></td>
                            <td></br></br>
                                <div class="custom-file small" >
                                    <input type="file" class="custom-file-input" id="customFile" name="Imagem">
                                    <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg">Selecione imagem</label>
                                  </div></td>
                        </tr>
                        <tr>
                            <td><p>CEP</p><input class="form-control" type="text"  id="campoCEP" style="width:200px;"/></td>
                            <td><p>Telefone</p><input class="form-control" type="text"  id="campoTelefone" style="width:200px;"/></td>
                            <td><h1>Listar Materias do professor</h1>
                                <div class="OverFlow">
                                <table class="table table-striped" style="font-size:25px;margin-right:100px;width: 100%; ">
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
                                         @if($TabelaIDMateria->isNotEmpty())
                                         @for($i=0;$i<sizeOf($TabelaIDMateria);$i++)
                                      <tr>
                                           
                                        <th scope="row"> {{ $TabelaIDMateria[$i]->materia_id }}</th>
                                    
                                        <td>{{ $TabelaNomeMateria[$i][0] }}</td>
                                        
                                        <td>{{ $TabelaPeriodo[$i][0] }}</td>
                                        <td>{{ $TabelaCurso[$i][0] }}</td>
                                        
                                      </tr>
                                      @endfor
                                      @endif
                                    </div>
                                    </tbody>
                                  </table>
                                </form>
                                </div>
                                </td>
                            
                        
                        </tr>
                        <tr>
                        <td>
                                <h3>Modificar cargo(Cargo atual:X)</h3>
                                <p>Alterar Cargo do professor</p>
                                <select id="Cargo" class="form-control" onchange="TrocarCargo()">
                                    <option value="">Selecione algum cargo</option>
                                    <option value="Horista">Horista</option>
                                    <option value="Tempo Parcial">Tempo Parcial</option>
                                    <option value="Tempo Integral">Tempo Integral</option>
                                    </select></td>
                            <td><div id="DivLucroHora"><p>Lucro por hora</p>
                                <input class="form-control" type="text" placeholder="Insira Valor"/>
                            </div>
                            </td>
                        </tr> 
                        <tr>
                            <td><button type="submit" class="btn btn-success" onclick="" id="BotaoAtualizar">Atualizar</button></td>
                            <td><button type="submit" class="btn btn-danger" onclick="" id="BotaoApagar">Apagar</button></td>
                            
                        </tr> 
                        
                        <tr>
                        <td>
                            <h1>Adicionar materias</h1>
                            <p>Cursos da materia que deseja adicionar</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                            <option value="">Selecione um curso</option>
                             
                                @foreach ($Cursos as $Curso){ 
                               <option value={{ $Curso->id }} > {{ $Curso->nome_curso }} </option>
                                @endforeach 
                            </select></td>
                            
                        </tr> 

                        <tr>
                        <td><p>Periodo da materia que deseja adicionar</p><select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                            </select></td>
                        </tr>
                        <tr>
                        <td><p>Adicionar Materia ao professor</p>
                          <select id="MateriaAdicionar" class="form-control">
                            </select>
                        </br>
                            <button type="button" class="btn btn-success" 
                            onclick="AdicionarMateria()">Adicionar materia</button>
                          </td>
                          <td>
                              <h2>Remover materia</h2>
                              <p>Remover Materia(s) que professor possui</p>
                            <select id="MateriaRemover" class="form-control">
                            @for($i=0;$i<sizeOf($TabelaIDMateria);$i++)
                             <option value={{ $TabelaIDMateria[$i]->materia_id }} > {{ $TabelaNomeMateria[$i][0] }} </option>
                            @endfor
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
        $('#campoTelefone').attr('readonly', true);
        $('#EdiçaoBotao').append("Editar");
        $('#BotaoAtualizar').show();
        $('#DivLucroHora').hide();
        $('#BotaoAtualizar').hide();
        $('#BotaoApagar').hide();
        $("#campoCEP").mask("99.999-999");
        $('#campoCPF').mask('000.000.000-00');
        $('#campoTelefone').mask('(00) 0000-00000');
        $('#CarteiraDeTrabalho').mask('000.000.000-00');
        </script>
        @endsection