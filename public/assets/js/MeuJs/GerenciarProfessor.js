function TrocarCargo(){
    if($('#Cargo').val()==='Horista'){
        $('#DivLucroHora').show();
    }else{
        $('#DivLucroHora').hide();
    }
}

function HabilitarEdiçao(){

if($('#DivEdiçao').val()==="Editar"){//clicou quando valor foi editar
    $('#Nome').attr('readonly', false);
    $('#CEP').attr('readonly', false);
    $('#CPF').attr('readonly', false);
    $('#EdiçaoMateria').show();
    $('#BotaoAtualizar').show();
    $('#DivEdiçao').val("Desabilitar Ediçao");//inverter
    

}if($('#DivEdiçao').val()==="Desabilitar Ediçao"){
    $('#Nome').attr('readonly', true);
    $('#CEP').attr('readonly', true);
    $('#CPF').attr('readonly', true);
    $('#EdiçaoMateria').hide();
    $('#BotaoAtualizar').hide();
    $('#DivEdiçao').val("Editar");
}
}
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
