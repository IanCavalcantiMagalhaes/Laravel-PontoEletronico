
<!DOCTYPE html>

<html>
    <head> <link href="css/MeuCss.css" rel="stylesheet">
       <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <script src="{{ asset('assets/js/MeuJs/Test.js') }}"></script>
       <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
       <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>img{
    width: 150px;
    height: 200px;  
}</style>
    </head>

<body> 


<div><h2>Let jQuery AJAX Change This Text</h2></div>
<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
<div id="div2"></div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Options</label>
    </div>
    <select class="custom-select" id="inputGroupSelect01">
      <option selected>Choose...</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>
  
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" onsubmit="readURL(input)">
    <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg">Escolha uma imagem</label>
  </div>
  <div id="image-holder"></div>
  <button type="button" class="btn btn-success" id="Botao" onclick="Alterar()">Success</button>
<button onclick="GerarForm()">Get External Content</button>

<input type="text" name="Cam" id="Campo" value=""/>+
<input type="text" name="Cam2" id="Campo2" value=""/>


    <div class="dropdown-menu" id="DIV">
      ...
    </div>
    <select id="Materia" name="materia" class="form-control" onchange="Alert()">
                    <option value="1">Selecione uma Materia</option>
                    <option value="2">Programaçao</option>
                    </select>
  </div>
  <form action="Mostrar" method="get" enctype="multipart/form-data">
  <div id="Div3">

  </div>
</form>
  @if($Arranjo!='vazio')
  @foreach($Arranjo as $Coluna)
<p>{{ $Coluna }}</p>
  @endforeach
@endif
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