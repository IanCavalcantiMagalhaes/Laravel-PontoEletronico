function pesquisarQueTipoDeDado(){
    
    //redirecionar para outra funçao
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
   if($('#TipoDeDado').val()==='Escolha'){
    $('#PesquisarPor').append(
        '<option>Escolha</option>'+
        '<option value="Id">Id</option>'+        
        '<option value="Nome">Nome</option>'
         ); 
   }
   

   HabilitarBusca();//colocado no final para indentificar alteraçao feita pelo append()
}function pesquisarPor(){
    
    
    $('#CampoPesquisa').val('');
    $('#CampoPesquisa').unmask();
   if($('#PesquisarPor').val()==='Id'){
    $('#CampoPesquisa').attr('placeholder','Insira id');
   }
   if($('#PesquisarPor').val()==='Nome'){
    $('#CampoPesquisa').attr('placeholder','Insira nome');
   }
   if($('#PesquisarPor').val()==='CPF'){
    $('#CampoPesquisa').attr('placeholder','Insira CPF');
    $('#CampoPesquisa').mask('000.000.000-00');
   }
HabilitarBusca();
}
function HabilitarBusca(){//ira verificar se todos dados foram escolhidos

if($('#PesquisarPor').val()==='Escolha' || $('#TipoDeDado').val()==='Escolha'){
    $('#CampoPesquisa').attr('readonly', true);
    $("#Botao").hide(); 
    $('#CampoPesquisa').attr('placeholder','Primeiro preencha as caixas de seleçoes');
    $("#Aviso").show(); 
}else{
    $('#CampoPesquisa').attr('readonly', false);
    $("#Botao").show(); 
    $("#Aviso").hide(); 
}

}
function PesquisarOQue(){//Sera responsavel por qual controller sera executado
    $('#Resultados').empty();
    if($('#TipoDeDado').val()==='Professor'){
        PesquisarProfessor();
    }if($('#TipoDeDado').val()==='Curso'){
        PesquisarCurso();
    }if($('#TipoDeDado').val()==='Periodo'){
        PesquisarPeriodo();
    }if($('#TipoDeDado').val()==='Materia'){
        PesquisarMateria();
    }
}


function PesquisarProfessor(){
  //alert($("#CampoPesquisa").val());
  //alert($('#PesquisarPor').val());
 
    $(document).ready(function(){
        $('#CorpoDaTable').empty();
        $('#CabeçalhoDaTable').empty();
        $.ajax({
          type: "GET",
          data: {CampoPesquisa: $("#CampoPesquisa").val(),
                 PesquisarPor:$('#PesquisarPor').val()},//PesquisarPor(id,nome,cpf)
          url:"/Pesquisar/AjaxPesquisaProfessor",success: function(data){
           // alert("Certo");

         for(var i=0;i<data.Result.length;i++){
            // alert(data.Result[i].nome );
             $('#Resultados').append(
                  '<form action="/GerenciarProfessor/Mostrar">'// "/GerenciarProfessor/Mostrar" em vez de "GerenciarProfessor/Mostrar" para tirar preefixo "Pesquisar/"
                + '<input type="text" name="ID" id="ID" value="'+data.Result[i].id+'"/>  ' 
                + 'Nome: '+data.Result[i].nome
                + '  <button type="submit" class="btn btn-info">Gerenciar professor </button></form></br></br>');

         
          }
       
       
        }});
});

    }function PesquisarCurso(){
        $(document).ready(function(){
            $('#CorpoDaTable').empty();
            $('#CabeçalhoDaTable').empty();
            $.ajax({
              type: "GET",
              data: {CampoPesquisa: $("#CampoPesquisa").val(),
                     PesquisarPor:$('#PesquisarPor').val()},//PesquisarPor(id,nome,cpf)
              url:"/Pesquisar/AjaxPesquisaCurso",success: function(data){
               alert("Certo");
                $('#CabeçalhoDaTable').append(
                  '<tr><th>ID</th>'
                 +'<th>Nome</th>'
                 +'<th>CPF</th>'
                 +'<th>Selecionar</th>'
                 +'</tr>');
                 
             for(var i=0;i<data.Result.length;i++){
                // alert(data.Result[i].nome );
                
                 $('#CorpoDaTable').append(
                      '<tr><form action="Mostrar">'
                    + '<td><input type="text" name="IdSelecionado" value="'+data.Result[i].id+'" readonly="readonly"/>'+'</td>' 
                    + '<td>'+data.Result[i].nome+ '</td>' 
                    + '<td scope="col">111.111.111-11</td>'
                    + '<td scope="col"><button type="submit" class="btn btn-info">Visualizar:'+data.Result[i].nome+'</button></td></form></tr>');
    
             
              }
           
           
            }});
    });
    }function PesquisarPeriodo(){

    }function PesquisarMateria(){

    }function PesquisarAula(){

    }



    