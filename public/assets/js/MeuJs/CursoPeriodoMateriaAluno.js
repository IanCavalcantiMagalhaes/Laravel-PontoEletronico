function ExecutarNoDadoSelecionado(){
    if($("#Escolhido").val()='Curso'){
        CursoAjax();
    }
    if($("#Escolhido").val()='Periodo'){
        PeriodoAjax();
    }
    if($("#Escolhido").val()='Materia'){
        
    }
    if($("#Escolhido").val()='Aula'){
        
    }

}
function CursoAjax(){//inserir em select de id Curso

    $(document).ready(function(){
       
          $.ajax({
            type: "GET",
            data:{IdCurso:$('Curso').val(),
                  EscolhidoComando:$("input[name='EscolhidoComando']:checked"
                  .val()),//Editar,Adicionar ou remover
                  CampoDeTexto:$('CampoDeTexto'.val())},
            url:"/AjaxAdicionar",//controller Curso
            success: function($result){
                
        
            }});
        });

}
function PeriodoAjax(){//alterar,remover ou adicionar periodo.
    $(document).ready(function(){
       
        $.ajax({
          type: "GET",
          data:{IdPeriodo:$('Periodo').val(),
                EscolhidoComando:$("input[name='EscolhidoComando']:checked").val(),
                CampoDeTexto:$('CampoDeTexto'.val())},
          url:"/Ajax",//controller Periodo
          success: function($result){
              
      
          }});
      });
    
}
function MateriaAjax(){
   
        $(document).ready(function(){
           
            $.ajax({
              type: "GET",
              data:{IdMateria:$('Materia').val(),
                    EscolhidoComando:$("input[name='EscolhidoComando']:checked".val()),
                    CampoDeTexto:$('CampoDeTexto'.val())},
              url:"/Ajax",//controller Periodo
              success: function($result){
                  
          
              }});
          });
        
    
    
}
function AulaAjax(){

    
}
//
function AlterarEditarAdicionarRemover(){//sera mostrado somente em editar e adicionar
  //  AlterarCursoPeriodoMateriaAula();
    $('#CampoDeTexto').empty();

    if($("input[name='EscolhidoComando']:checked").val()==='Editar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Altere valor aqui");
        $("#Botao").attr('value', 'Editar');
        
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Adicione novo valor aqui");
        $("#Botao").attr('value', 'Adicionar');
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
        $('#CampoDeTexto').hide(); 
        $("#Botao").attr('value', 'Remover');
    }

}
function AlterarCursoPeriodoMateriaAula(){//Escolhera entre Curso,Periodo ou Materia
  //  AlterarEditarAdicionarRemover();
    $('#Curso').empty();
    $('#Periodo').empty();
    $('#Materia').empty();
    $('#CampoDeTexto').empty();
    $('#Turno').hide();
if($('#Escolhido').val()==='Selecione'){
  
    
    }
if($('#Escolhido').val()==='Curso'){
    $('#Curso').show();
    $('#TextoCurso').show();
    $('#Turno').show();
    $('#Periodo').hide();
    $('#Materia').hide();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar curso
        $('#Curso').hide();$('#TextoCurso').hide();$('#Turno').hide();
    }
 
}if($('#Escolhido').val()==='Periodo'){//Podera selecionar o curso e periodo que vai alterar/adicionar/remover
    $('#Curso').show();
    $('#Periodo').show();
    $('#Materia').hide();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar periodo
        $('#Periodo').hide();
    }
}if($('#Escolhido').val()==='Materia'){
    $('#Curso').show();
    $('#Periodo').show();
    $('#Materia').show();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar materia
        $('#Materia').hide();
    }

}if($('#Escolhido').val()==='Aula'){
    $('#Curso').show();
    $('#Periodo').show();
    $('#Materia').show();
    $('#InserirHorario').show();
    $('#InserirHorario').mask("00:00");

}
AlterarCursoPeriodoMateriaAula();
$(document).ready(function(){//inserir Cursos toda vez que modificar
    $('#Curso').empty();
       $.ajax({
         type: "GET",
         url:"/CarregarCursos",success: function(data){
          
         for(var i=0;i<data.Cursos.length;i++){
 
            $('#Curso').append("<option value='"+data.Cursos[i].id+"'>"+data.Cursos[i].nomeCurso+"</option>");
          }
      
       }});
});
}

function atualizar(){
//Adicionar,editar e remove
    $('#CampoDeTexto').empty();

    if($("input[name='EscolhidoComando']:checked").val()==='Editar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Altere valor aqui");
        $("#Botao").attr('value', 'Editar');
        
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        $('#CampoDeTexto').show();
        $('#CampoDeTexto').attr("placeholder","Adicione novo valor aqui");
        $("#Botao").attr('value', 'Adicionar');
    }
    if($("input[name='EscolhidoComando']:checked").val()==='Remover'){
        $('#CampoDeTexto').hide(); 
        $("#Botao").attr('value', 'Remover');
    }


//Tipos de dado:
    $('#Curso').empty();
    $('#Periodo').empty();
    $('#Materia').empty();
    $('#CampoDeTexto').empty();
    $('#Turno').hide();
if($('#Escolhido').val()==='Selecione'){
  
    
    }
if($('#Escolhido').val()==='Curso'){
    $('#Curso').show();
    $('#TextoCurso').show();
    $('#Turno').show();
    $('#Periodo').hide();
    $('#TextoPeriodo').hide();
    $('#Materia').hide();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar curso
        
        $('#Curso').hide();
        $('#TextoCurso').hide();
        $('#Turno').hide();//alert("Ola");
    }
 
}if($('#Escolhido').val()==='Periodo'){//Podera selecionar o curso e periodo que vai alterar/adicionar/remover
    $('#Curso').show();
    $('#TextoCurso').show();
    $('#Periodo').show();
    $('#TextoPerido').show();
    $('#Materia').hide();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar periodo
        $('#Periodo').hide();
        $('#TextoPeriodo').hide();
        alert("OLA");
        
    }

}if($('#Escolhido').val()==='Materia'){
    $('#Curso').show();
    $('#Periodo').show();
    $('#Materia').show();
    $('#InserirHorario').hide();
    if($("input[name='EscolhidoComando']:checked").val()==='Adicionar'){
        //ao adicionar nao precisara selecionar materia
        $('#Materia').hide();
    }

}if($('#Escolhido').val()==='Aula'){
    $('#Curso').show();
    $('#Periodo').show();
    $('#Materia').show();
    $('#InserirHorario').show();
    $('#InserirHorario').mask("00:00");

}
AlterarCursoPeriodoMateriaAula();
$(document).ready(function(){////inserir Cursos toda vez que modificar
    $('#Curso').empty();
       $.ajax({
         type: "GET",
         url:"/CarregarCursos",success: function(data){
          
         for(var i=0;i<data.Cursos.length;i++){
 
            $('#Curso').append("<option value='"+data.Cursos[i].id+"'>"+data.Cursos[i].nomeCurso+"</option>");
          }
      
       }});
});
}

//Abaixo:Opçoes de selecionar

function AoAlterarCurso(){
alert("Ola");
    $(document).ready(function(){//inserir periodos
     // alert( $("#Curso").val());
      $('#Periodo').empty();
      $('#Materia').empty();
        $.ajax({
          type: "GET",
          data: {IdCurso: $("#Curso").val()},
          url:"/AjaxPeriodo",success: function(data){
           
          for(var i=0;i<data.Periodos.length;i++){

              $('#Periodo').append("<option value='"+data.Periodos[i].id+"'>"+data.Periodos[i].nomePeriodo+"</option>");
           }
       
        }});
});
      }
function AoAlterarPeriodo(){//inserir materias
$(document).ready(function(){

$('#Materia').empty();
  $.ajax({
    type: "GET",
    data: {Campo: $("#Periodo").val()},
    url:"/AjaxMateria",success: function($result){
        for(var i=0;i<$result.length;i++){//
            $('#Materia').append("<option value="+$result[i].id+">"+$result[i].Nome+"</option>");
        }

    }});
});
}
