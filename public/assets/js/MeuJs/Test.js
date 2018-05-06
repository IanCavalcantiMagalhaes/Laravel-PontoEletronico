function PegarDados(){
    $(document).ready(function(){//Recber dados de tabela
   alert("OIOI");
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/Somar",
             success:function(result){
              $('#div1').append(result);
               
           }
          });
   }
   );
   }