function HabilitarEdiçao(){
    $('#Nome').attr('readonly', false);
    $('#CEP').attr('readonly', false);
    $('#CPF').attr('readonly', false);
    $('#EdiçaoMateria').show();
}
function AdicionarMateria(){
//comando ajax abaixo:Adicionar id de funcionario e materia em uma table(id_funcionario_materia) e atualizar select

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
function VerificarSeValorAdicionadoEstaRepetido(){
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
}
