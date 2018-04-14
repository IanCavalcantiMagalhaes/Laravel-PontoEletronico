
    //Abaixo eles irao se comunicar com AjaxControl.php
    //HTML:InserirProfessor.php
    function PegarDados(){
        $(document).ready(function(){//Recber dados de tabela
       
               $.ajax({
                 type: "GET",
                 data: {Campo: $("#Campo").val()},
                 url:"/Somar",success: function(result){
                  
                   $('#div1').append(result);
                   
               }});
       }
       );
       }

    function ListarPesquisa(){
        $(document).ready(function(){//Pesquisar@ExecutarPesquisa
   
            $.ajax({
              type: "GET",
              data: {CampoDetexto: $("#CampoDePesquisa").val(),Selecionar:$("#ValorSelecionado").txt()},
              url:"/RealizarPesquisa",success: function($result){
               
                for(var i=0;i<15;i++){
                     $('#Tabela').append(
                           "<tr>\\"
                        + '<form action="../">\\'
                        + '<td>+$result.id+</td>\\'
                        + '<td>+$result.nome+</td>\\'
                        + '<td>+$result.telefone+</td>\\'
                        + '<td><select name="Escolha" id="Escolha_id">\\'
                        + '<option>Ler</option>\\'
                        + '<option>Editar</option>\\'
                        + '</select></td>\\'
                        + '<td><input type="submit" value="Visualizar" /></td>\\'
                        + '</form>\\'
                        + '</tr>\\');
                }}
            });
        });
    }
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

                $(document).ready(function(){//inserir periodos
                 // alert( $("#Curso").val());
                  $('#Periodo').empty();
                  $('#Materia').empty();
                    $.ajax({
                      type: "GET",
                      data: {IdCurso: $("#Curso").val()},
                      url:"/AjaxPeriodo",success: function(data){
                       
                      for(var i=0;i<data.Periodos.length;i++){
            
                          $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].NomePeriodo+"</option>");
                       }
                   
                    }});
            });
                  }
      function AoAlterarPeriodo(){//inserir materias
        $(document).ready(function(){
           
            $('#idMateria').empty();
              $.ajax({
                type: "GET",
                data: {Campo: $("#idPeriodo").val()},
                url:"/AjaxMateria",success: function($result){
                    for(var i=0;i<$result.length;i++){//
                        $('#Materia').append("<option value="+$result[i].id+">"+$result[i].Nome+"</option>");
                    }
        
                }});
        });
    }
    
    function TrocarCampoDeTexto(){//alternara entre campo com mascara e campo sem mascara
        var e = document.getElementById("Escolha");
        var txt = e.options[e.selectedIndex].text;
       if($("#Escolha option:selected")==="CPF"){
              $("#Campo").atrr('placeholder','Digite CPF');
        $("#Campo").mask('999.999.999-99');

           }if($("#Escolha option:selected")==="Id"||$("#Escolha option:selected")==="Nome"
            || $("#Escolha option:selected")==="Selecione"){
              
                $("#Campo").atrr('placeholder','Digite Id ou Nome');
                  $("#Campo").unmask();
           }
            

       }
      


// http://clubedosgeeks.com.br/programacao/listando-registro-de-banco-de-dados-mysql-com-ajax-json-e-php

function executa(){
                
            var e = document.getElementById("Escolha_id");
             
            var txt = e.options[e.selectedIndex].text; alert(txt);
            if(txt==="Ler"){
                document.getElementById("Senha_id").style.display = "none";
                
            }if(txt==="Editar"){
                 document.getElementById("Senha_id").style.display = "block";
              
            }
} 

function executarAjax(){
      
    $(document).ready(function(){
        $('#tabela').empty(); //Limpando a tabela
        $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            url: 'BD_Para_Ajax.php/AjaxPeriodo',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
                for(var i=0;i<15;i++){
                    //Adicionando registros retornados na tabela
            
                    $('#tabela').append('<p>'+dados[i].id+'</p><p>'+dados[i].nome+'</p><p>'+dados[i].email+'</p>');
                    
                }
                
            }
        });
    });
}
/*
function executarAjaxEmSelectPeriodo(){
      
    $(document).ready(function(){
        $('#Periodo').empty(); //Limpando o Periodo
        $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            url: 'getDados.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
                for(var i=0;i<15;i++){
                 
              
                    $('#Periodo').append('<Option>'
                    +dados[i].nome+
                    '</Option>');//Guardara valor no bd
                    
                }
                
            }
        });
    });
}
*/