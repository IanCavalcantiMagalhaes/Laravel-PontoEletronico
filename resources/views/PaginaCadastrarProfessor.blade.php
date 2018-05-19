@extends('Templates/TemplateNavBar')


@section('conteudo')

        <form action="{{route('InserirProfessor')}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
                  @if ($errors->any())
    </br>
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif
    <table cellpadding="15" style="margin:0 auto;">
            <thead>
                <tr>
                    <th><h2>Cadastro Professor </h2></th>
                    <th></th>
                    <th><div id="image-holder" style="border-style: groove;width: 250px;
                        height: 250px; "></div></th>
                </tr>
            </thead>
            
            
            
         
            <tbody>
                <tr>
                    <td> <p>Nome</p><input class="form-control" type="text" name="nome" value="" /></td>
                    <td><p>CPF</p><input class="form-control" type="text" name="cpf" value="" id="CPF" style="width:200px;"/></td>
                    <td></br></br>
                        <div class="custom-file small" >
                            <input type="file" class="custom-file-input" id="customFile"   accept="image/png, image/jpeg" name="image">
                            <label class="custom-file-label" for="customFile" >Selecione imagem</label>
                          </div></td>
                </tr>
                <tr>
                    <td><p>CEP</p><input class="form-control" type="text" name="cep" value="" id="CEP" style="width:200px;"/></td>
                    <td><p>Telefone(Opcional)</p><input class="form-control" type="text" name="Telefone" value="" id="Telefone" style="width:200px;"/></td>
                    
                    
                
                </tr>
                <tr>
                    <td><p>Carteira de trabalho(Opcional)</p><input class="form-control" type="text" name="CarteiraDeTrabalho" value="" id="CarteiraDeTrabalho" style="width:200px;"/></td>
                    <td></td>
                    
                </tr> 
                
                <tr>
                <td><p>Cursos</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control" name="curso">
                    <option value="">Selecione um curso</option>
              
                        @foreach ($Cursos as $Curso){ 
                       <option value={{ $Curso->id }} > {{ $Curso->nome_curso }} </option>
                        @endforeach 
                    </select></td>
                    <td><p>Cargos</p><select id="Cargo" class="form-control">
                            <option>Selecione algum cargo</option>
                            <option>Horista</option>
                            <option>Tempo Parcial</option>
                            <option>Tempo Integral</option>
                            </select></td>
                </tr> 
                <tr>
                <td><p>Periodo</p>
                    <select id="Periodo" name="periodo" onchange="AoAlterarPeriodo()" class="form-control">
                    </select></td>
                </tr>
                <tr>
                <td><p>Materia</p><select id="Materia" name="materia" class="form-control">
                    </select></td> 
                    </tr>

                    <tr>
                            <td></td>         
               <td><button type="submit" class="btn btn-success" onclick="VerificarDadosCadastraisAJax()">Cadastrar</button></td>  
                <td></td>  
               </tr>
            </tbody>
        </table>
  

       {{--@if($errors->any())
       @endif--}}
      
 </form>


</body>
</html>

<script>
       
        $("#customFile").on('change', function () {
          http://matheuspiscioneri.com.br/blog/preview-de-imagem-antes-do-upload-filereader/
         // Matheus Piscioneri /Acessado:15 de abril de 2018
            if (typeof (FileReader) != "undefined") {
         
                var image_holder = $("#image-holder");
                image_holder.empty();
                
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                        
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else{
                alert("Este navegador nao suporta FileReader.");
            }
            $("html").css('height', '100%');
            $("body").css('height', '100%');
            
            
        });
        $("#CEP").mask("99.999-999");
        $('#CPF').mask('000.000.000-00');
        $('#Telefone').mask('(00) 0000-00000');
        $('#CarteiraDeTrabalho').mask('000.000.000-00');
        </script>
        @endsection