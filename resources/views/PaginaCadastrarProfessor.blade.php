
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
 <script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CadastrarProfessor.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Cadastrar Professor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>
<title>Adicionar produto a lista</title>



<script>$("#MascaraCPF").mask("000.000.000-00");
        $("#MascaraCEP").mask("00000-000");
        $("#MascaraTelefone").mask("(00)00000-0000");
</script>
<link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
<script src="{{ asset('assets/js/MeuJs/CadastrarProfessor.js') }}"></script>
<style>img{
        width: 150px;
        height: 200px;  
    }
</style>
</head>
<body class="TelaDeFundo">
<section class="sessao">

    <form action="Inexistente">
    <table cellpadding="10">
            <thead>
                <tr>
                    <th><p>Nome produto </p></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <p>Nome</p><input type="text" name="Nome" value="" /></td>
                    <td><p>CPF</p><input type="text" name="CPF" value="" id="MascaraCPF"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><p>CEP</p><input type="text" name="CPF" value="" id="MascaraCEP"/></td>
                    <td><p>Telefone</p><input type="text" name="CPF" value="" id="MascaraTelefone"/></td>
                    <td></td>
                    <td> <div id="image-holder"></div><div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" >
                            <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg">Selecione imagem</label>
                          </div>
                    </td>
                
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                
                <tr>
                <td><p>Cursos</p><select id="Curso" onchange="AoAlterarCurso()" class="form-control">
                    <option value="Selecionar">Selecione um curso</option>
                    <?php foreach ($Cursos as $Curso){        ?>
                    <option value="<?php echo $Curso->id ?>"><?php echo $Curso->nomeCurso ?></option>
                    <?php }?>
                    </select></td>
                    <td><p>Cargos</p><select id="Cargo" class="form-control">
                            <option>Selecione algum cargo</option>
                            <option>Horista</option>
                            <option>Tempo Parcial</option>
                            <option>Tempo Integral</option>
                            </select></td>
                </tr> 
                <tr>
                <td><p>Periodo</p><select id="Periodo" onchange="AoAlterarPeriodo()" class="form-control">
                    <option>Selecione um Periodo</option>
                    </select></td>
                </tr>
                <tr>
                <td><p>Materia</p><select id="Materia" class="form-control">
                    <option>Selecione uma Materia</option>
                    </select></td>
                </tr>
               
               
            </tbody>
        </table>
     
   
        <button type="submit" class="btn btn-success" onclick="VerificarDadosCadastraisAJax()">Success</button>
 </form>


</section>

</body>
</html>

<script>

        $("#customFile").on('change', function () {
          http://matheuspiscioneri.com.br/blog/preview-de-imagem-antes-do-upload-filereader/
         // Matheus Piscioneri
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
        });
        </script>