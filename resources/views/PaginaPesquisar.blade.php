@extends('Templates/TemplateNavbar')

@push('DiretoriosJS')
<script src="{{ asset('assets/js/MeuJs/Pesquisar.js') }}"></script>
@endpush

@section('conteudo')


                <div  style="position:absolute;left:30%;">
                  <input type="text" placeholder="Primeiro preencha as caixas de seleçoes" id="CampoPesquisa" style="width:450px;" readonly>
                  <button type="button" class="btn btn-success" onclick="PesquisarProfessor()" id="Botao">Procurar</button>
                  <div class="alert alert-warning" role="alert" id="Aviso" style="position:relative;top:5px;">
                    <strong>AVISO:</strong>
                    </br>Para procurar dados será necessario
                    </br>selecionar informaçoes de pesquisa
                    </br>na caixas de seleçoes á esquerda
                  </div>
                </div>
                <div class="alert alert-info" role="alert" style="margin-left: 1100px;font-size:20;">
                  OBSERVAÇÃO:</br>Para Gerenciar professor (Ler,Alterar ou remover dados de professor)
                  sera necessario procurar ele nesta pagina 
                </div>
                <div style="position:absolute;top:0px;">
                <p>O que deseja pesquisar:</p>
                   <select name="Tipo" id="TipoDeDado" onchange="pesquisarQueTipoDeDado()" class="form-control">
                       <option>Escolha</option>
                       <option>Professor</option>
                       <option>Curso</option>
                       <option>Periodo</option>
                       <option>Materia</option>
                       <option>Aluno</option>
                   </select>


               <p>Pesquisar dado por:</p>
            <select id="PesquisarPor" onchange="pesquisarPor()" class="form-control">
                <option>Escolha</option>
                <option value="Id">Id</option>
                <option value="Nome">Nome</option>
               
            </select>
          </div>
            <div id="Cargo">
            <p>Filtre o cargo</p>
                   <select name="Cargos" id="SeletorDeCargo">
                       <option>Escolha</option>
                       <option>Professor em tempo integral</option>
                       <option>Professor em tempo parcial</option>
                       <option>Horista</option>
                   </select>
                  </div>
                 
                   
             <div class="table-responsive" style="position:relative;width:50%;margin:0 auto;top:100px;">
             <table cellpadding="10" border="1" style="position:relative;margin:0 auto;" id="TabelaAjax" class="table table-striped">
            <thead id="CabeçalhoDaTable">
                <tr><th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Selecionar</th>
                </tr>
            </thead>
            <tbody id="CorpoDaTable">
              {{-- @if($Tabelas!=null) --}}
              {{-- @foreach($Tabelas as $coluna) --}}
              <tr>
                <form action="{{ route('GerenciarProfessor') }}">{{-- form para enviar ID para controller e view de GerenciarProfessor e assim listar todos os dados --}}
                <td scope="col" id="Indentificador">1</td>
                <td scope="col">Ian</td>
                <td scope="col">111.111.111-11</td>
                <td scope="col"><button type="submit" class="btn btn-info" >Visualizar:Ian</button></td>
                </form>
              </tr>
               
            </tbody>
        </table>
                <p id="P"></p>             
         
                       <!-- https://laravel.com/docs/5.6/blade#if-statements -->
<script>
    $("#Cargo").hide();
    $("#Botao").hide();
</script>
@endsection
