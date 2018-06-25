@extends('Templates/TemplateNavBar')


@section('conteudo')
        <section class="Sessao"> 
            @if ($errors->any())
                        </br>
                    <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                @endforeach
                  </ul>
                 </div>
                @endif
            <form action="{{ route('AtualizarProfessor') }}" >
                

                @if(session('AlertaDeAtualizaçao'))
                <div class="alert alert-success" role="alert">
                <strong>Concluido - </strong>{{ session('AlertaDeAtualizaçao') }}
                </div>
                @endif
                @if(session('AlertaDeRemoçao'))
                    <div class="alert alert-success" role="alert">
                    <strong>Concluido - </strong>{{ session('AlertaDeRemoçao') }}
                    </div>
                @endif
                @if(session('AlertaDeAdiçao'))
                  @if( session('AlertaDeAdiçao') === "Adicionado Com Sucesso")
                    <div class="alert alert-success" role="alert">
                    <strong>Concluido - </strong>{{ session('AlertaDeAdiçao') }}
                    </div>
                  
                  @else
                    <div class="alert alert-warning" role="alert">
                    <strong>Atenção - </strong>{{ session('AlertaDeAdiçao') }}
                    </div>
                  @endif
                @endif
                @if(session('AlertaAulaIrregular'))
                    <div class="alert alert-warning" role="alert">
                    <strong>Atenção - </strong>{{ session('AlertaAulaIrregular') }}
                    </div>
                @endif
              <div class="alert alert-warning" role="alert" id="divDePermissao">
                        
                    </div>
                   


                </br>
            <table cellpadding="30" >
                    <thead>
                        <tr>
                            <th><h3>Gerenciar dados de Professor(ID:<span id="ID">{{ $TabelaFuncionario->id }}</span>) </h3>
                            </th>
                            <input class="form-control" type="hidden" name="ID"  value={{ $TabelaFuncionario->id }} />
                            <th><button type="button" class="btn btn-success"
                              onclick="VerificarPermissao()" id="EdiçaoBotao"></button></th>
                              <input type="hidden" name="nomeAdmin" id="nomeAdmin" value={{ session()->get('nome') }} />
                            <th><div id="image-holder"style="border-style: groove;width: 250px;
                                height: 250px; "></div></th>
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
                            <td><p>CEP</p><input class="form-control" type="text" name="CEP"  id="campoCEP" style="width:200px;" value={{ $TabelaFuncionario->CEP }} /></td>
                            <td><p>Telefone</p><input class="form-control" type="text" name="Telefone"  id="campoTelefone" style="width:200px;" value={{ $TabelaFuncionario->Telefone }}></td>
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
                                
                                </div>
                                </td>
                            
                        
                        </tr>
                        <tr>
                        <td>
                                <h5>Modificar cargo(Cargo atual:{{ $TabelaFuncionario->Cargo }} )</h5>
                                <p>Alterar Cargo do professor</p>
                                <select id="Cargo" class="form-control" onchange="TrocarCargo()" name="Cargo">
                                        <option value="">Selecione cargo</option>
                                    <option value="Tempo Integral">Tempo Integral</option>
                                    <option value="Tempo Parcial">Tempo Parcial</option>
                                    <option value="Horista">Horista</option>
                                    </select></td>
                            <td><div id="DivLucroHora"><p>Valor por hora</p>
                                <input class="form-control" type="text" placeholder="Insira Valor"/>
                            </div>
                            </td>
                        </tr> 
                        <tr>
                            <td><button type="submit" class="btn btn-success" onclick="" id="BotaoAtualizar">Atualizar</button></td></form>
                            <td><form action="{{ route('ApagarProfessor') }}" >
                                <input class="form-control" type="hidden" name="ID" value={{ $TabelaFuncionario->id }} />
                                <button type="submit" class="btn btn-danger" onclick="" id="BotaoApagar">Apagar</button>
                            </form>
                            </td>
                            <td><form action="" >
                                <input class="form-control" type="hidden" name="ID" value={{ $TabelaFuncionario->id }} />
                                <button type="submit" class="btn btn-primary center-block" id="BotaoAulaIrregular" onclick="" id="BotaoApagar">Inserir aula irregular></button>
                            </form>
                            </td>
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
                        <td><form action="{{ route('AdicionarMateria') }}" >
                            <input type="hidden" name="ID" value={{ $TabelaFuncionario->id }} />
                            <p>Adicionar Materia ao professor</p>
                          <select id="Materia" name="MateriaAdicionar" class="form-control">
                            </select>
                        </br>
                            <button type="submit" class="btn btn-success" 
                            >Adicionar materia</button>
                         </form>
                          </td>
                          <td><form action="{{ route('RemoverMateria') }}" >
                              <input type="hidden" name="ID" value={{ $TabelaFuncionario->id }} />
                              <h2>Remover materia</h2>
                              <p>Remover Materia(s) que professor possui</p>
                            <select name="MateriaRemover" class="form-control">
                            @for($i=0;$i<sizeOf($TabelaIDMateria);$i++)
                             <option value={{ $TabelaIDMateria[$i]->materia_id }} > {{ $TabelaNomeMateria[$i][0] }} </option>
                            @endfor
                              </select>
                            </br>
                              <button type="submit" class="btn btn-danger">Remover materia</button>
                            </form>
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
        $('#divDePermissao').hide();
        $('#BotaoAulaIrregular').hide();
        $("#campoCEP").mask("99.999-999");
        $('#campoCPF').mask('000.000.000-00');
        $('#campoTelefone').mask('(00)0000-00000');
        $('#CarteiraDeTrabalho').mask('000.000.000-00');
        </script>
        @endsection