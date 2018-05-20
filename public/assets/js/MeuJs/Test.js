function PegarDados(){
    $(document).ready(function(){//Recber dados de tabela
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/Somar",
             success:function(result){
              $("#Div3").append('<form action="{{ route(PaginaLogar) }}">'
              +'<button type="submit">Clicar</button>'
              +'</form>');
           }
          });
   }
   );
   }
   function GerarForm(){
    $("#Div3").append('<tr>'//action="route('GerenciarProfessor/Mostrar/{data.Result[i].id}')"
    + '<td><input type="text" name="id" id="ID" value="" />'+'</td>' 
    + '<td></td>' 
    + '<td scope="col">111.111.111-11</td>'
    + '<td scope="col"><button type="submit" class="btn btn-info">Visualizar: </button></td></tr>');
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