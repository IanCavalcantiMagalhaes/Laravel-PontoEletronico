
<!DOCTYPE html>
<html>
    <head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">

    </head>
    <body>
        <section class="sessao">
               <form action="{{route('InserirProfessor')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile" accept="image/png, image/jpeg,image/jpg">Selecione imagem</label>
                  </div> 
                  <button type="submit" class="btn btn-success" id="img">Success</button>
                </form>
</section>
    </body>
</html>