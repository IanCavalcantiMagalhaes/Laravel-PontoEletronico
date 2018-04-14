function VerificarDadosCadastraisAJax(){//Proibir acesso por erro de dados OU aceitar e inserir
    var alerta;
    alerta="Conteudos abaixo estao inseridos de forma incorreta:\n";
    if($("#Nome").val()===null){
        alerta+="Nome\n";
        $("#Nome").css("border-color","red");
        
    }
    if($("#CPF").val()===null){
        alerta+="CPF\n";
        $("#CPF").css("border-color","red");               
    }
    if( $("#CEP").val()===null){
        alerta+="CEP\n";
        $("#CEP").css("border-color","red");               
    }
    if($("#Telefone").val()===null){
        alerta+="Telefone\n";
        $("#Telefone").css("border-color","red");               
    }
    if($("#Materia").val()===null){
        alerta+="Materia Selecionada\n";
        $("#Telefone").css("border-color","red");               
    }
    if($("#Nome").val()===null || $("#CPF").val()===null || $("#CEP").val()===null){//Ouve erro
      alert(alerta);
    }else{//Todos os dados corretos
    $.ajax({
        type: "GET",
        data:{Nome: $("#Nome").val(),CPF: $("#CPF").val()},
        url:"/AjaxInserirProfessor",success: function(data){
    
             window.location.replace("http://127.0.0.1:8000/PaginaPrincipal");
       
      }});

    }
    
}
function AoAlterarCurso(){
alert("OLA");
    $(document).ready(function(){//inserir periodos
     // alert( $("#Curso").val());
      $('#Periodo').empty();
      $('#Materia').empty();
        $.ajax({
          type: "GET",
          data: {IdCurso: $("#Curso").val()},
          url:"/AjaxPeriodo",success: function(data){
            $('#Periodo').append("<option value=''>"+"Selecione um periodo"+"</option>");
          for(var i=0;i<data.Periodos.length;i++){

              $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].NomePeriodo+"</option>");
           }
       
        }});
});
      }
function AoAlterarPeriodo(){//inserir materias
$(document).ready(function(){

$('#Materia').empty();
  $.ajax({
    type: "GET",
    data: {Campo: $("#idPeriodo").val()},
    url:"/AjaxMateria",success: function($result){
        $('#Materia').append("<option value=''>"+"Selecione uma materia"+"</option>");
        for(var i=0;i<$result.length;i++){//
            $('#Materia').append("<option value="+$result[i].id+">"+$result[i].Nome+"</option>");
        }

    }});
});
}
