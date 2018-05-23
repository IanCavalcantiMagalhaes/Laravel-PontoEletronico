function TrocarCargo(){
    
    if($('#Cargo').val()==="Horista"){
        $('#DivLucroHora').show();
    }else{
        $('#DivLucroHora').hide();
    }
}

function Ediçao(){

var ValorAtual=$('#EdiçaoBotao').text();//para quando ocorrer alteraçao nao entre no if errado

if(ValorAtual==="Editar"){//clicou quando valor foi editar
    
    $('#campoNome').attr('readonly', false);
    $('#campoCEP').attr('readonly', false);
    $('#campoCPF').attr('readonly', false);
    $('#campoTelefone').attr('readonly', false);
    $('#EdiçaoMateria').show();
    $('#BotaoAtualizar').show();
    $('#BotaoApagar').show();
    $('#EdiçaoBotao').empty();
    $('#EdiçaoBotao').append("Desabilitar Ediçao");

    
}if(ValorAtual==="Desabilitar Ediçao"){
    $('#campoNome').attr('readonly', true);
    $('#campoCEP').attr('readonly', true);
    $('#campoCPF').attr('readonly', true);
    $('#campoTelefone').attr('readonly', true);
    $('#EdiçaoMateria').hide();
    $('#BotaoAtualizar').hide();
    $('#BotaoApagar').hide();
    $('#EdiçaoBotao').empty();
    $('#EdiçaoBotao').append('Editar');

    
   
}}
function AdicionarMateria(){
    
    $(document).ready(function(){

    $('#Materia').empty();
      $.ajax({
        type: "GET",
        data: {id_Materia: $("#MateriaAdicionar").val(),
               id_Funcionario: $("#ID").val()},//'ID' igual ao form gerado em pesquisar para ter o mesmo nome do request e assim poder utilizar o mesmo controller
        url:"",success: function($result){

           
        }});
    });
}
function VerificarDados(){//Proibir acesso por erro de dados OU aceitar e inserir
  //  alert("Professor re-cadastrado com sucesso");
     /* var alerta;
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
     */
 }

function RemoverMateria(){
//comando ajax abaixo:Remover id de funcionario e materia em uma table(id_funcionario_materia) e atualizar select

}
function AtualizarListaDeMateriasPossuidas(){
        $("#ListaDeMaterias").empty();
        //comando ajax abaixo:apagar e inserir novamente lista

}
function AtualizarSelectDeMateriasPossuidas(){

    //comando ajax abaixo:apagar e inserir novamente lista

}

function AtualizarPagina(){
    $(document).ready(function(){

        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {ID: $("#ID").val()},//'ID' igual ao form gerado em pesquisar para ter o mesmo nome do request e assim poder utilizar o mesmo controller
            url:"",success: function($result){

               
            }});
        });
}
function VerificarSeValorAdicionadoJaEstavaAdicionado(){
    $(document).ready(function(){

        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {idFuncionario: $("#Id").val(),idAdicionado: $("#MateriaAdicionar").val()},
            url:"",success: function($result){

               if($result===false){
                  alert("Este item ja estava adicionado");
               }else{
                VerSeProfessorUltrapassouLimiteDe5Materias();
               }
               
            }});
        });
    /*Este ajax ira executar este controller
    $Tabela=
    FuncionarioMateria::select('id_materia')
    ->where('id_funcionario',$request->idFuncionario)
    ->get();
    PermitirAdiçao=true;
    foreach($Tabela as $dados){//ira verificar se id de funcionario e materia estao relacionados se tiver nao ira permitir adiçao
             if($dados->id_materia==$request->idAdicionado){
                  PermitirAdiçao=false;
             }
    }
    response::json(PermitirAdiçao);
    
    */ 
}function VerSeProfessorUltrapassouLimiteDe5Materias(){
    $(document).ready(function(){

        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {idFuncionario: $("#Id").val()},
            url:"",success: function($result){

               if($result===false){
                  alert("Limite de 5 materias por professor sera ultrapassado");
               }else{
                VerificarSeAlgumProfessorPossuiJaEstaMateria();
               }

            }});
        });
         /*Este ajax ira executar este controller
    $Tabela=
    FuncionarioMateria::select('id_materia')
    ->where('id_funcionario',$request->idFuncionario)
    ->get();
    PermitirAdiçao=true;$i=0;
    foreach($Tabela as $dados){//verificar se ja tem limite de 5
             $i++;
             if($i==5){
                  PermitirAdiçao=false;
             }
             
    }
    response::json(PermitirAdiçao);
    
    */ 
}function VerificarSeAlgumProfessorPossuiJaEstaMateria(){
    $(document).ready(function(){

        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {idFuncionario: $("#Id").val(),idAdicionado: $("#MateriaAdicionar").val()},
            url:"",success: function($result){

               if($result===false){
                  alert("Ja existe professor com esta materia");
               }else{
                AdicionarMateria();
               }

            }});
        });
        /*Este ajax ira executar este controller
    $Tabela=
    FuncionarioMateria::
    select('id_materia')
    ->get();
    PermitirAdiçao=true;
    foreach($Tabela as $dados){//verificar se id_materia ja esta adicionada para algum outro professor
             
             if($dados->id_materia==$request->idAdicionado){
                  PermitirAdiçao=false;
             }
             
    }
    response::json(PermitirAdiçao);
    
    */ 
}

function AoAlterarCurso(){
    $('#Periodo').empty();
    $(document).ready(function(){//inserir periodos em select
      $('#Periodo').empty();
      $('#Materia').empty();
        $.ajax({
          type: "GET",
          data: {IdCurso: $("#Curso").val()},
          url:"/AjaxPeriodo",success: function(data){
              if(data===false){
                $('#Periodo').empty();//deixara vazio por que escolheu a opçao 'selecione um curso' em que nao existe id
              }else{

            $('#Periodo').append("<option value=''>"+"Selecione um periodo"+"</option>");
          for(var i=0;i<data.Periodos.length;i++){
              $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].nome_periodo+"</option>");
           }
       }
        }});
});
      }
function AoAlterarPeriodo(){//inserir materias

    $('#Materia').empty();

    $(document).ready(function(){
      $.ajax({
        type: "GET",
        data: {IdPeriodo: $("#Periodo").val()},
        url:"/AjaxMateria",success: function(result){

            if(result===false){
               $('#Materia').empty();//deixara vazio por que escolheu a opçao 'selecione um periodo' em que nao existe id
              }else{

            $('#Materia').append("<option value=''>"+"Selecione uma materia"+"</option>"); 
            for(var i=0;i<result.Materias.length;i++){//
                $('#Materia').append("<option value="+result.Materias[i].id+">"+result.Materias[i].nome_materia+"</option>");
            }
        }
        }});
    });
}
