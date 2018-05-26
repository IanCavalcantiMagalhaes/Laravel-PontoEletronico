
<html>
    <head><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/MeuCss.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tela de login</title>
        
        <style type="text/css">

        .AlinharEAumentarCampoDeTexto{
            width: 500px;
            right: 50%;
        }fieldset{
         position: relative;border-color: white; margin:0px auto;top: 200px;width: 30% ;height: 60%;border-radius: 10px;
        }h1{
            position: relative;text-align: center;color: white;s
        }label{
          color: white;
        }.AlinharForm{
          position:absolute;margin:0px auto;
        }
        </style>
         
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
        <script src="{{ asset('assets/js/MeuJs/Login.js') }}"></script>
    </head>
    <body class="TelaDefundo">
      <p style="position:absolute;color:yellow;">Usuario:Ian/Senha:123456</p>
          <fieldset>
          <h1>Sistema de Ponto Eletronico</h1>
          <form class="AlinharForm" action="{{route('Autenticar')}}" method="post">
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
            <label>Nome do usuario:</label><br>
              <input type="text" name="nome" value="" placeholder="Digite seu nome de usuario" class="AlinharEAumentarCampoDeTexto"/><br>

            <label>Senha:</label><br>
              <input type="password" value="" name="senha" placeholder="Digite sua senha" class="AlinharEAumentarCampoDeTexto"/><br><br>
              <button type="submit" class="btn btn-primary" >Logar</button>

      
             </form>

          <p>Usuario:Ian/Senha:123456</p>

          
        </fieldset>
        <fieldset>
        @if(session('ERRO'))
            <div class="alert alert-danger" style="botton:500px;">
              <strong>Erro!</strong> {{session('ERRO')}}
              @endif
            </fieldset>
         </body>
</html>