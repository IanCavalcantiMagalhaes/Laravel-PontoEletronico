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
            alert("");
          if(data===true){
             $("#Saida").show();
          }if(data===false){
            $("#Erro").show();
          }
          }});
  });
}
function AnaliseSairOuEntrar(){
  $("#Sair").hide();$("#Entrar").hide();$("#Erro").hide();
  $(document).ready(function(){//inserir periodos
    
        $.ajax({
          type: "GET",
          data: {CPF: $("#cpf").val()},
          url:"/MarcarPonto/Registrando",
          success: function(data){
            alert($("#cpf").val());
          
          for(var i=0;i<data.RS.length;i++){
           
        if(data.RS[i].trabalhando===1){
           $("#Saida").show();
           MostrarNomeDoFuncionarioLiberado();
        }
        if(data.RS[i].trabalhando===0){
          $("#Entrada").show();
          MostrarNomeDoFuncionarioLiberado();
        }else{
          $("#Erro").show();
        }
      }
        }});
});
}
function MostrarNomeDoFuncionarioLiberado(){
  $(document).ready(function(){
  $.ajax({
    type: "GET",
    data: {CPF: $("#cpf").val()},
    url:"/MarcarPonto/VisualizarFuncionario",
    success: function(result){
      for(var i=0;i<result.Professor.length;i++){
      
      $("#Indentificaçao").append(result.Professor[i].nome+" de id "+result.Professor[i].id);
      }
}});
});
}
