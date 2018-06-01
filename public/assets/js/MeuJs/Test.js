function PegarDados(){
    $(document).ready(function(){//Recber dados de tabela
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/TestAjax",
             success:function(result){
              $("#Div3").append(
                result.Um.nome+" / "+result.Dois
              );
           }
          });
   }
   );
   }
 
   function Alterar(){
    $("#Botao").empty();
    $("#Botao").append("A");
   }

   function FecharModal(){
    $('#MyModal').modal('hide')
   }
   function AbrirModal(){
    $('#MyModal').modal('show')
   }