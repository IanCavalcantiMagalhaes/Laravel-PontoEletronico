
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<!DOCTYPE html>
    <head>  <link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/MeuCss.css" rel="stylesheet">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Pesquisar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Marcar Ponto <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('CadastrarProfessor/CadastroProfessor') }}">Cadastrar Professor</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('GerenciarCursos/Curso') }}">Gerenciar Cursos</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link disabled" href="{{ url('MarcarPonto/RegistrarEntrada_Saida') }}">Pesquisar</a>
                </li>
              </ul>
            </div>
          </nav>
<script src="js/Pesquisar.js"></script>
        <script>

 function TrocarCampoDeTexto(){//alternara entre campo com mascara e campo sem mascara
         var e = document.getElementById("Escolha");
         var txt = e.options[e.selectedIndex].text;
        if($("#Escolha option:selected")==="CPF"){
               $("#Campo").atrr('placeholder','Digite CPF');
         $("#Campo").mask('999.999.999-99');

            }if($("#Escolha option:selected")==="Id"||$("#Escolha option:selected")==="Nome"
             || $("#Escolha option:selected")==="Selecione"){
               
                 $("#Campo").atrr('placeholder','Digite Id ou Nome');
                   $("#Campo").unmask();
            }
                 $("#botaoSemMascara").val('');

        }
       
</script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Pesquisar</title>
        <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
        <script src="{{ asset('assets/js/MeuJs/Pesquisar.js') }}"></script>
    </head>
    <body class="TelaDeFundo" >

        <section class="Sessao">
                <div  style="position:absolute;left:30%;">
                  <input type="text" placeholder="Insira um valor que queira pesquisar" id="CampoPesquisa" style="width:250px;">
                  <input type="button" name="botao-ok" value="Pesquisar" onclick="PesquisarProfessor()">
                </div>
               <p>Pesquisar dado por:</p>
            <select name="" onchange="TrocarPlaceholderDeCampo()" id="PesquisarPor"  class="selectpicker">
                <option value="Id">Id</option>
                <option value="Nome">Nome</option>
                <option value="CPF">CPF</option>
            </select>
                 



            <p>Filtre o cargo</p>
                   <select name="Cargos" id="SeletorDeCargo">
                       <option>Professor em tempo integral</option>
                       <option>Professor em tempo parcial</option>
                       <option>Horista</option>
                   </select>
                 
                   <p>O que deseja pesquisar</p>
                   <select name="Cargos" id="TipoDeDado">
                       <option>Professor</option>
                       <option>Curso</option>
                       <option>Periodo</option>
                       <option>Materia</option>
                       <option>Aluno</option>
                   </select>

             <div class="table-responsive">
             <table cellpadding="10" border="1" style="position:relative;margin:0 auto;" id="Tabela" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Escolha</th>
                    <th>Executar</th>
                </tr>
            </thead>
            <tbody id="CorpoDaTable">

               
                
               
            </tbody>
        </table>
                <p id="P"></p>             
         
                       <!-- https://laravel.com/docs/5.6/blade#if-statements -->
                      
</section>
<script> 
$("#Tabela").hide(); 
</script>
   </body>
</html>

