@extends('Templates/TemplateNavBar')


@section('conteudo')

@if(session('NegarAcesso'))
<p>Voçe nao tem permissao</p>
@endif

@if($Usuarios)
include('TelaDeConfiguraçoes/EditarERemoverUsuario');
@endif

@if(session('Cadastrar'))
include('TelaDeConfiguraçoes/AdicionarUsuario');
@endif
@else
<a href="{{ route('VerificarPermissividade',['Escolha'=>"Adicionar"]) }}">Adicionar usuario</a>
<a href="{{ route('VerificarPermissividade',['Escolha'=>"Alterar"]) }}">Alterar ou remover usuario</a>


</section>

</body>
</html>

@endsection
