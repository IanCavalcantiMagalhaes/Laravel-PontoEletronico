function AnaliseTest(){  
  $("#Erro").hide();
$("#Saida").hide();
$("#Entrada").hide();
    $(document).ready(function(){//inserir periodos
     
          $.ajax({
            type: "GET",
            data: {CPF: $("#cpf").val()},
            url:"/MarcarPonto/RegistrandoTest",
            success: function(data){
          if(data===true){
             $("#Saida").show();
          }if(data===false){
            $("#Erro").show();
          }
          }});
  });
}
function AnaliseSairOuEntrar(){
  $("#Saida").hide();$("#Entrada").hide();$("#Erro").hide();
  $("#TempoFeito").empty();
  $(document).ready(function(){//inserir periodos
        $.ajax({
          type: "GET",
          data: {CPF: $("#cpf").val()},
          url:"/MarcarPonto/Registrando",
          success: function(data){
           
        if(data.RS.Trabalhando===1){
           $("#Saida").show();
           $("#TempoFeito").append(data.TempoFeito);
           MostrarNomeDoFuncionario();
        }
        if(data.RS.Trabalhando===0){
          $("#Entrada").show();
           MostrarNomeDoFuncionario();
        }if(data.RS==='erro'){
          $("#Erro").show();
        }
          
        
      
        }});
});
}
function MostrarNomeDoFuncionario(){
  $("#Indentificaçao").empty();$(".HorarioTotal").empty();
  $(document).ready(function(){
  $.ajax({
    type: "GET",
    data: {CPF: $("#cpf").val()},
    url:"/MarcarPonto/VisualizarFuncionario",
    success: function(result){

      for(var i=0;i<result.Professor.length;i++){
      
      $("#Indentificaçao").append(result.Professor[i].nome+" de id "+result.Professor[i].id);
      $(".HorarioTotal").append("Foi feito nesta semana:"+result.Professor[i].HorarioFeitoNaSemana+" minuto(s)");
    }
}});
});
}
