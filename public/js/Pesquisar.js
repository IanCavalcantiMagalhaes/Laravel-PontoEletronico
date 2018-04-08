function pesquisarQueTipoDeDado(){//redirecionar para outra funçao
   if($('#TipoDeDado').val()==='Professor'){
       PesquisarProfessor();
   }
   if($('#TipoDeDado').val()==='Curso'){

   }
   if($('#TipoDeDado').val()==='Periodo'){
      
   }
   if($('#TipoDeDado').val()==='Materia'){

   }
   if($('#TipoDeDado').val()==='Aula'){
        $('.DiasDaSemana').show();//Mostrara radio de dias da semana
}

}
function PesquisarProfessor(){
  OLA();
 
    $(document).ready(function(){
        $('#CorpoDaTable').empty();
        $.ajax({
          type: "GET",
          data: {CampoPesquisa: $("#CampoPesquisa").val(),
                 PesquisarPor:$('#PesquisarPor').val()},
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

    function OLA(){
        alert("BOM DIA");
    }