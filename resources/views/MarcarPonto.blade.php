@extends('Templates/TemplateNavBar')


@section('conteudo')

@include('Mensagens.MarcarPonto')

 <div class="AjustarCampoEBotao">
  <input type="text" name="CPF" id="cpf" class="form-control" 
  placeholder="Digite CPF" style="margin:0 auto;width:25%;">
  <div class="col-sm-12 text-center" style="top:10px;">
  <button type="button" onclick="AnaliseSairOuEntrar()" class="btn btn-primary center-block" >Marcar Ponto</button>
  </div>
 </div>
        
  <div>
  <div class="alert alert-success" class="AjustarAlertas" role="alert" id="Entrada" style="top:100px;">
  <h4 class="alert-heading">Entrada liberada</h4>
  <p>Entrada permitida para <span id="Indentificaçao"></span></p>
  <hr>
  <p class="mb-0"><span class="HorarioTotal"></span></p>
     </div>

     <div class="alert alert-success" class="AjustarAlertas" role="alert" id="Saida" style="top:100px;">
        <h4 class="alert-heading">Saida liberada 
          (Minutos feitos:<span id="TempoFeito"></span>)</h4>
        <p>Saida permitida para <span id="Indentificaçao"></span></p>
        <hr>
        <p class="mb-0"><span class="HorarioTotal"></span></p>
           </div>


<div class="alert alert-danger" class="AjustarAlertas" role="alert" id="Erro" style="top:100px;">
  <h4 class="alert-heading">Falha no registro</h4>
  <p>CPF nao reconhecido pelo sistema</p>
  <hr>
  <p class="mb-0">Somente pelo banco ira indentificar professores</p>
</div>


</section>

</body>
</html>
<script>
$("#cpf").mask("000.000.000-00");
$("#Erro").hide();

$("#Saida").hide();
$("#Entrada").hide();
setTimeout(function(){ 
   $("#Alertas").fadeOut(); }
  , 3000);

</script>
@endsection
