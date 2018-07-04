@extends('Templates/TemplateNavBar')


@section('conteudo')

<p>Procure aqui usuario que deseja manipular</p>//https://select2.org/getting-started/installation
<select class="js-example-basic-single" name="Usuario" id="UsuarioSelecionado" onchange="UsuarioSelecionado()">//funçao do onchange pegar dados de usuario selecionado e listar em um form
    @foreach($Usuarios as $U)
    <option value={{ $U->nome }}>$U->nome</option>
    @endforeach
  </select>
<form action="">
 <input type="hidden" name="NomeAntigo" id="NomeAntigo" class="form-control" style="margin:0 auto;width:25%;">
<div style="margin:0 auto;width:25%;">
 <input type="text" name="NomeNovo" id="NomeNovo" class="form-control">
 <input type="password" name="senha" id="senha" class="form-control">
</div>
<button type="submit" class="btn btn-primary center-block" >Atualizar</button>
</form>

</section>


</body>
</html>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });</script>
@endsection