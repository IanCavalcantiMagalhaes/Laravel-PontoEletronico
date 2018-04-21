function PegarDados(){
  alert("OLA");
    $(document).ready(function(){//Recber dados de tabela
   
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/Somar",success: function(result){
              alert(result);
               $('#div1').append(result);
               
           }});
   }
   );
   }