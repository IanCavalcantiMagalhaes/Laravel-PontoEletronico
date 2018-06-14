@extends('Templates/TemplateNavBar')


@section('conteudo')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

                <p>Procure professor pelo nome</p>
                <select name="ID"  id="mySelect2" onKeyPress="Procura()" class="js-example-basic-single" style="">{{-- Lembrar de nao ser possivel --}}
                 @foreach($Professor as $Professor)

                 <option value={{ $Professor->id }}>{{ $Professor->id }}.{{ $Professor->nome }}(CPF:{{ $Professor->CPF }})</option>

                 @endforeach
                </select>

</section>

</body>
</html>
<script>
   // https://select2.org/getting-started/basic-usage
   // https://pt.stackoverflow.com/questions/7292/select2-com-ajax
   
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
function Procura(){
  alert($("#mySelect2").val());
    $(document).ready(function(){//inserir periodos
        $.ajax({
          type: "GET",
          data: {nome: $("#mySelect2").val()},//enviara nome que quer fazer pesquisa
          url:"AulaIrregular@ProcurarProfessor",
          success: function(data){
           
            if(data===false){
                $('#mySelect2').empty();//deixara vazio por que escolheu a opçao 'selecione um curso' em que nao existe id
            }else{

             for(var i=0;i<data.Periodos.length;i++){
                $('#mySelect2').append("<option value='"+data.RS[i].id+"'>"+data.RS[i].id+"."+data.RS[i].nome+"</option>");
           }
       }
        
      
        }});
});
}

</script>
@endsection
