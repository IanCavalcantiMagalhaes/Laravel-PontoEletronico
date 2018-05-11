function BotaoExecutarClicado(){
    if($("#Escolhido").val()='Curso'){
        Curso();
    }
    if($("#Escolhido").val()='Periodo'){
        Periodo();
    }
    if($("#Escolhido").val()='Materia'){
        Materia();
    }
    if($("#Escolhido").val()='Aula'){
        Aula();
    }

}

function Curso(){//Opçoes de adicionar,remover e alterar serao indentificadas no controller
    $(document).ready(function(){//inserir periodos
         $('#Periodo').empty();
         $('#Materia').empty();
           $.ajax({
             type: "GET",
             data: {IdCurso: $("#Curso").val(),
             EscolhidoComando:$("input[name='EscolhidoComando']:checked".val()),//remover,adicionar ou alterar
             Turno:$("#Turno").val()},
             url:"/GerenciarCursos/Curso",success: function(){
             
           }});
   });
}
function Periodo(){
    $(document).ready(function(){//inserir periodos
           $.ajax({
             type: "GET",
             data: {IdPeriodo: $("#Periodo").val(),
             EscolhidoComando:$("input[name='EscolhidoComando']:checked".val()),
             Sala:$('#Sala').val()},//remover,adicionar ou alterar
             url:"/GerenciarCursos/Periodo",success: function(data){
            
           }});
   });
}
function Materia(){
    $(document).ready(function(){//inserir periodos
           $.ajax({
             type: "GET",
             data: {IdMateria: $("#Materia").val(),
             EscolhidoComando:$("input[name='EscolhidoComando']:checked".val())},//remover,adicionar ou alterar
             url:"/GerenciarCursos/Materia",success: function(data){
            
           }});
   });
}


function atualizar(){
$('#Carregando').show();
//Adicionar,editar e remover

    $('#CampoDeTexto').empty();
    $("#TextoBotao").empty();

    
    if($("input[name='EscolhidoComando']:checked").val()==='Editar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Altere nome aqui");
        $('#Sala').attr("placeholder","Altere sala aqui");
        $("#TextoBotao").append('Editar');
        
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Adicione novo nome aqui");
        $('#Sala').attr("placeholder","Adicione sala");
        $("#TextoBotao").append('Adicionar');
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
        $('#CampoDeTexto').hide(); //nao é necessario adicionar nada no campo de texto
        $("#TextoBotao").append('Remover');
    }


//Tipos de dado:
    $('#Curso').empty();
    $('#Periodo').empty();
    $('#Materia').empty();
    $('#CampoDeTexto').empty();
    $('#Turno').hide();
    $('#TextoMateria').hide();
    $('#CampoDeTexto').attr('readonly',false);
    $('#DivInserirHorario').hide();


if($('#Escolhido').val()==='Curso'){
    $('#DivCurso').show();
    $('#Turno').show();

    $('#DivPeriodo').hide();
    $('#TextoPeriodo').hide();

    $('#DivPeriodo').hide();
    $('#DivSala').hide();

    $('#DivMateria').hide();
   

    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar curso
        
        $('#Curso').hide();
        $('#TextoCurso').hide();
        $('#Turno').show();
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
       $('#Turno').hide();//nao precisare selecionar turno
    }

}if($('#Escolhido').val()==='Periodo'){//Podera selecionar o curso e periodo que vai alterar/adicionar/remover
    $('#Curso').show();
    $('#TextoCurso').show();
    $('#Periodo').show();
    $('#TextoPeriodo').show();
    $('#DivPeriodo').show();
    $('#DivSala').show();
    $('#Materia').hide();
    $('#TextoMateria').hide();
    
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar periodo
        $('#Periodo').hide();
        $('#TextoPeriodo').hide();
        
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
        $('#Turno').hide();//nao precisara selecionar turno
        $('#DivSala').hide();
     }
}if($('#Escolhido').val()==='Materia'){
    $('#Curso').show();
    $('#TextoCurso').show();
    $('#Periodo').show();
    $('#TextoPeriodo').show();
    $('#Materia').show();
    $('#TextoMateria').show();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar materia
        $('#Materia').hide(); $('#TextoMateria').hide();
    }
    

}if($('#Escolhido').val()==='Aula'){
    $('#Curso').show();
    $('#Periodo').show();
    $('#TextoCurso').show();
    $('#TextoPeriodo').show();
    $('#Materia').show();
    $('#TextoMateria').show();
    $('#DivInserirHorario').show();
    
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
        $('#DivInserirHorario').hide();//nao precisa inserir horarios
     }

}
$(document).ready(function(){//re-inserir Cursos toda vez que modificar
    $('#Curso').empty();
       $.ajax({
         type: "GET",
         url:"/GerenciarCursos/CarregarCursos",
         success: function(data){
            //$('#Curso').append("<option value=''>"+"Selecione um curso"+"</option>");
         for(var i=0;i<data.Cursos.length;i++){
 
            $('#Curso').append("<option value='"+data.Cursos[i].id+"'>"+data.Cursos[i].nome_curso+"</option>");
          }
      
       }});
});

HabilitarEdiçoes();
$('#Carregando').hide();
}

function HabilitarEdiçoes(){
if($('#Escolhido').val()==='Selecione'){
    $('#CampoDeTexto').attr('readonly',true);
    $('#Botao').hide();
    }else{
        $('#CampoDeTexto').attr('readonly',false);
        $('#Botao').show();
    }
}

//Abaixo:Opçoes de selecionar

function AoAlterarCurso(){
    $(document).ready(function(){//inserir periodos em select
      $('#Periodo').empty();
      $('#Materia').empty();
        $.ajax({
          type: "GET",
          data: {IdCurso: $("#Curso").val()},
          url:"/AjaxPeriodo",success: function(data){
            //$('#Periodo').append("<option value=''>"+"Selecione um periodo"+"</option>");
          for(var i=0;i<data.Periodos.length;i++){

              $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].nome_periodo+"</option>");
           }
       
        }});
});
      }
function AoAlterarPeriodo(){//inserir materias em select e campo de texto sala
    $(document).ready(function(){
    $('#Materia').empty();
      $.ajax({
        type: "GET",
        data: {IdPeriodo: $("#Periodo").val()},
        url:"/AjaxMateria",success: function(result){
           // $('#Materia').append("<option value=''>"+"Selecione uma materia"+"</option>");
            for(var i=0;i<result.Materias.length;i++){//
                $('#Materia').append("<option value="+result.Materias[i].id+">"+result.Materias[i].nome_materia+"</option>");
            }
    
        }});
    });
    $(document).ready(function(){
        $('#Sala').empty();
           $.ajax({
             type: "GET",
             url:"/GerenciarCursos/CarregarSala",
             data: {IdPeriodo: $("#Periodo").val()},
             success: function(data){
                 alert('Sucesso');
                for(var i=0;i<data.Sala.length;i++){
                $('#Sala').val(data.Sala[i].sala);
                }
               
           }});
    });
}
