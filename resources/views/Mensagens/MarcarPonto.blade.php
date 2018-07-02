<div id="Alertas">
    @if(session('AlertaDeCadastro'))
        <div class="alert alert-success" role="alert">
        <strong>Concluido - </strong>{{ session('AlertaDeCadastro') }}
        </div>
    @endif

    @if(session('AlertaDeRemoçao'))
        <div class="alert alert-success" role="alert">
        <strong>Concluido - </strong>{{ session('AlertaDeRemoçao') }}
        </div>
    @endif

    @if(session('AlertaAulaIrregular')){{-- Adicionado com sucesso --}}
        <div class="alert alert-success" role="alert">
        <strong>Concluido - </strong>{{ session('AlertaAulaIrregular') }}
        </div>
    @endif

    {{--@if($M)
        <div class="alert alert-success" role="alert">
        <strong>Concluido - </strong>{{ $M[0] }}
        </div>
    @endif

    @if($RespostaDePonto)
        <div class="alert alert-success" class="AjustarAlertas" role="alert" id="Saida" style="top:100px;">
            <h4 class="alert-heading">{{ $RespostaDePonto[0] }}</h4>
            <p>{{ $RespostaDePonto[1] }}</p>
            <hr>
            <p class="mb-0">{{ $RespostaDePonto[2] }}</p>
               </div>
    @endif
    @if($ErroDePonto)
    <div class="alert alert-danger" class="AjustarAlertas" role="alert" id="Erro" style="top:100px;">
  <h4 class="alert-heading">Falha no registro</h4>
  <p>CPF nao reconhecido pelo sistema</p>
  <hr>
  <p class="mb-0">Somente pelo banco ira indentificar professores</p>
</div>
--}}
</div>