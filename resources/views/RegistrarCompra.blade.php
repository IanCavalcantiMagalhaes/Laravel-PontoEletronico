@extends('Templates/TemplateNavBar')


@section('conteudo')
        <section class="Sessao"> 
            
            <form action="{{ route('AtualizarRegistroDeCompra') }}" >
            <h1>Compra de numero:4</h1>
             <div style="position:absolute;border-style:solid;width:25%;">
                 
                 <p>CPF(Vendedor/Funcionario)</p>
                 <input type="text" name="CPFVendedor">
                 <p>CPF(Comprador/Cliente)</p>
                 <input type="text" name="CPFComprador">
                 <p>Descriçao</p>
                 <input type="text" name="Descriçao">
                 <button type="button" class="btn btn-success" >Atualizar Registro</button>
             </div>
             <div style="position:absolute;border-style:solid;width:25%;right:0px;">
               <h4>Adicionar produto</h4>
               <label for="id_label_single">
                Que produtos ele comprou
              
                <select class="js-example-basic-single js-states form-control" id="id_label_single">

                        <optgroup label="Group Name">
                          <option>Nested option</option>
                        </optgroup>
                      
                </select>
              </label>
              
               
                <button type="button" class="btn btn-success" >Adicionar produto</button>
             </div>
              <div style="margin:0 auto;position:absolute;bottom:60%;width:100%;">
             <h3>Produtos relacionados a compra abaixo:</h3>
          
             <div class="alert alert-success">
                    <strong>Success!</strong>{{ session('Alerta') }}
                  </div>
           <table cellpadding="15" class="table table-striped">
                <thead>
                    <tr>
                        <th><h2>ID</h2></th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="OverFlow">
                        <td>1</td>
                        <td>nome</td>
                        <td><form action="{{ route('AlterarQuantidadeDoProdutoDoRelacionamento') }}">
                            <input type="hidden" name="IDCompra"><input type="hidden" name="IDProduto">
                            <input type="hidden" name="QuantidadeAntiga">
                            <input type="text" name="QuantidadeNova" value="X" style="width:40px;"> 
                            <button type="button" class="btn btn-success" >Alterar Quantidade</button>
                            </form>
                        </td>
                        <td><input type="hidden" name="IDCompra"><input type="hidden" name="IDProduto">
                            <button type="button" class="btn btn-danger" >Remover produto</button></td>
                    </tr>
                </tbody>
            </table>
                </div>
        </section>
    </body>
</html>


        @endsection
        <script>$().ready(function() {
                setTimeout(function () {
                    $('#Alerta').hide(); // "foo" é o id do elemento que seja manipular.
                }, 2500); // O valor é representado em milisegundos.
            });</script>