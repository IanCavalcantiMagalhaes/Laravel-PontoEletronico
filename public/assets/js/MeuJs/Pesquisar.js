function pesquisarQueTipoDeDado(){//redirecionar para outra funçao
    $('#CampoPesquisa').val('');
    $('#CampoPesquisa').attr('readonly', true);
   
    $("#PesquisarPor").empty(); 
    $("#Cargo").hide(); 

   if($('#TipoDeDado').val()==='Professor'){
      //   $("#Cargo").show(); 
         $('#PesquisarPor').append(
            '<option>Escolha</option>'+
            '<option value="Id">Id</option>'+
            '<option value="Nome">Nome</option>'+
            '<option value="CPF">CPF</option>'
             ); 
       
 
       //PesquisarProfessor();
   }
   if($('#TipoDeDado').val()==='Curso'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+
        '<option value="Nome">Nome</option>'
         ); 
   }
   if($('#TipoDeDado').val()==='Periodo'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+
        '<option value="Nome">Nome</option>'
         ); 
   }
   if($('#TipoDeDado').val()==='Materia'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+
        '<option value="Nome">Nome</option>'
         ); 
   }
   if($('#TipoDeDado').val()==='Aula'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+
        '<option value="Nome">Nome</option>'
         ); 
   }  
   if($('#TipoDeDado').val()==='Selecione'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+        
        '<option value="Nome">Nome</option>'
         ); 
   }
   

   
$("#Tabela").show(); 

}function pesquisarPor(){
    
    $('#CampoPesquisa').val('');
    $('#CampoPesquisa').unmask();
    if($('#PesquisarPor').val()==='Selecione'){
    $('#CampoPesquisa').attr('placeholder','Primeiro preencha as caixas de seleçoes');
    $('#CampoPesquisa').attr('readonly', true);
    
   }
   if($('#PesquisarPor').val()==='Id'){
    $('#CampoPesquisa').attr('placeholder','Insira id');
    alert("ID");
    $('#CampoPesquisa').attr('readonly', false);
   }
   if($('#PesquisarPor').val()==='Nome'){
    $('#CampoPesquisa').attr('placeholder','Insira nome');
    $('#CampoPesquisa').attr('readonly', false);
   }
   if($('#PesquisarPor').val()==='CPF'){
    $('#CampoPesquisa').attr('placeholder','Insira CPF');
    $('#CampoPesquisa').attr('readonly', false);
    $('#CampoPesquisa').mask('000.000.000-00');
   }

}
function PesquisarProfessor(){
  OLA();
 
    $(document).ready(function(){
        $('#CorpoDaTable').empty();
        $.ajax({
          type: "GET",
          data: {CampoPesquisa: $("#CampoPesquisa").val(),
                 PesquisarPor:$('#PesquisarPor').val()},//PesquisarPor(id,nome)
          url:"/AjaxPesquisaProfessor",success: function(data){
           
         for(var i=0;i<data.Result.length;i++){
             alert(data.Result[i].nome );
             $('#CorpoDaTable').append(
                  '<tr><form action="Mostrar">'
                + '<td><input type="text" name="IdSelecionado" value="'+data.Result[i].id+'" readonly="readonly"/>'+'</td>' 
                + '<td>'+data.Result[i].nome+ '</td>' 
                + '<td><select name="Escolha"><option>Editar ou remover</option><option>Somente ler<option></select></td></form></tr>');

         
          }
       
       
        }});
});

    }function PesquisarCurso(){

    }function PesquisarPeriodo(){

    }function PesquisarMateria(){

    }function PesquisarAula(){

    }

    function TrocarPlaceholderDeCampo(){
        if($("#PesquisarPor").val()='Id'){
            $("#CampoPesquisa").atrr('placeholder','Inserir ID');
        }
        if($("#PesquisarPor").val()='Nome'){
            $("#CampoPesquisa").atrr('placeholder','Inserir nome');
        }
    }