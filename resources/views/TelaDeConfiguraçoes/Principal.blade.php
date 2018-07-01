@extends('Templates/TemplateNavBar')


@section('conteudo')

@if(session('NegarAcesso'))
<p>Voçe nao tem permissao</p>
@endif


<a href="{{ route('RealizarAçao',['Escolha'=>"Adicionar",'Nome'=> session()->get('nome') ]) }}">Adicionar usuario</a>
<a href="{{ route('RealizarAçao',['Escolha'=>"Alterar",'Nome'=> session()->get('nome')]) }}">Alterar ou remover usuario</a>


</section>

</body>
</html>

@endsection
