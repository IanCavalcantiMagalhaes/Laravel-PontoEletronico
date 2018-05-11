function VerificarDadosCadastraisAJax(){//Proibir acesso por erro de dados OU aceitar e inserir
  // alert("Professor cadastrado com sucesso");
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
alert("Ola");
    $(document).ready(function(){//inserir periodos
     
      $('#Periodo').empty();
      $('#Materia').empty();
        $.ajax({
          type: "GET",
          data: {IdCurso: $("#Curso").val()},
          url:"/AjaxPeriodo",
          success: function(data){
            $('#Periodo').append("<option value=''>"+""+"</option>");
          for(var i=0;i<data.Periodos.length;i++){

              $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].nome_periodo+"</option>");
           }
        
        }});
});
      }
function AoAlterarPeriodo(){//inserir materias
$(document).ready(function(){
    alert($("#Periodo").val());
$('#Materia').empty();
  $.ajax({
    type: "GET",
    data: {IdPeriodo: $("#Periodo").val()},
    url:"/AjaxMateria",success: function(result){
        alert(result);
       // $('#Materia').append("<option value=''>"+""+"</option>");
        for(var i=0;i<result.Materias.length;i++){//
            $('#Materia').append("<option value="+result.Materias[i].id+">"+result.Materias[i].nome_materia+"</option>");
        }

    }});
});
}
function AdicionarProfessor(){
    //inserir materias
        $(document).ready(function(){
        alert($("#img").val());
        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {Imagem:$("#img").val()},
            url:"/CadastrarProfessor/AjaxInserirProfessor",success: function($result){
                

            }});
        });
}
