
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
         position: relative;border-color: white; margin:0px auto;top: 200px;width: 30% ;height: 40%;border-radius: 10px;
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
   
          <fieldset>
          <h1>Sistema de Ponto Eletronico</h1>
          <form class="AlinharForm" action="{{route('Autenticar')}}" method="post">
              {{ csrf_field() }}
            <label>Email:</label><br>
              <input type="text" name="nome" value="" placeholder="Digite seu email" class="AlinharEAumentarCampoDeTexto"/><br>

            <label>Senha:</label><br>
              <input type="text" value="" name="senha" placeholder="Digite sua senha" class="AlinharEAumentarCampoDeTexto"/><br><br>
              <button type="submit" class="btn btn-primary" >Logar</button>
             </form>


        </fieldset>
         </body>
</html>