function TrocarCargo(){
    if($('#Cargo').val()==='Horista'){
        $('#DivLucroHora').show();
    }else{
        $('#DivLucroHora').hide();
    }
}

function HabilitarEdiçao(){
    $('#Nome').attr('readonly', false);
    $('#CEP').attr('readonly', false);
    $('#CPF').attr('readonly', false);
    $('#EdiçaoMateria').show();
}
function AdicionarMateria(){//Vai ir e voltar do controller:MostrarDados@AdicionarMateriaAoProfessor
//comando ajax abaixo:Adicionar id de funcionario e materia em uma table(id_funcionario_materia) e atualizar select

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
function VerificarSeValorAdicionadoJaEstavaAdicionado(){
    $(document).ready(function(){

        $('#Materia').empty();
          $.ajax({
            type: "GET",
            data: {idFuncionario: $("#Id").val(),idAdicionado: $("#MateriaAdicionar").val()},
            url:"",success: function($result){
               if($result===false){
                  alert("Este item ja esta adicionado");
               }else{
                AdicionarMateria()
               }
            }});
        });
    /*Este ajax ira executar este controller
    $Tabela=
    table(id_funcionario_materia)->select('id_materia')
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
}function VerificarSeAlgumProfessorPossuiEstaMateria(){
    
}
