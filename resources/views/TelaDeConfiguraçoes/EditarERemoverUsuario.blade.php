@extends('Templates/TemplateNavBar')


@section('conteudo')

<p>Procure aqui usuario que deseja manipular</p>//https://select2.org/getting-started/installation
<select class="js-example-basic-single" name="Usuario" id="UsuarioSelecionado" onchange="">//funçao do onchange pegar dados de usuario selecionado e listar em um form
    @foreach($Usuarios as $U)
    <option value={{ $U->id }}>$U->nome</option>
    @endforeach
  </select>
<form action=""></form>

</section>

</body>
</html>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });</script>
@endsection