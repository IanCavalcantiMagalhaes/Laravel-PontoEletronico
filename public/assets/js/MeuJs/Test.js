function PegarDados(){
    $(document).ready(function(){//Recber dados de tabela
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/Somar",
             success:function(result){
              $('#div1').append(result);
              $('#div2').append(result.Array);
           }
          });
   }
   );
   }
   function Alert(){
    alert($("#Materia").val());
    $(document).ready(function(){//Recber dados de tabela
           $.ajax({
             type: "GET",
             url:"/Somar",
             success:function(result){
              //alert(result);
               
           }
          });
   }
   );
   }