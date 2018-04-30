
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
                  <input type="text" placeholder="Primeiro preencha as caixas de seleçoes" id="CampoPesquisa" style="width:450px;" readonly>
                  <button type="button" class="btn btn-success" onclick="PesquisarProfessor()" id="Botao">Procurar</button>
                  <div class="alert alert-warning" role="alert" id="Aviso" style="position:relative;top:5px;">
                    <strong>AVISO:</strong></br>Para procurar dados será necessario
                    </br>especificar o que deseja pesquisar
                    </br>na caixas de seleçoes á esquerda
                  </div>
                </div>
                <div class="alert alert-info" role="alert" style="margin-left: 1100px;font-size:20;">
                  OBSERVAÇÃO:</br>Para Gerenciar professor (Ler,Alterar ou remover dados de professor)
                  sera necessario procurar ele nesta pagina 
                </div>
                <div style="position:absolute;top:0px;">
                <p>O que deseja pesquisar</p>
                   <select name="Tipo" id="TipoDeDado" onchange="pesquisarQueTipoDeDado()">
                       <option>Escolha</option>
                       <option>Professor</option>
                       <option>Curso</option>
                       <option>Periodo</option>
                       <option>Materia</option>
                       <option>Aluno</option>
                   </select>


               <p>Pesquisar dado por:</p>
            <select id="PesquisarPor" onchange="pesquisarPor()">
                <option>Escolha</option>
                <option value="Id">Id</option>
                <option value="Nome">Nome</option>
               
            </select>
          </div>
            <div id="Cargo">
            <p>Filtre o cargo</p>
                   <select name="Cargos" id="SeletorDeCargo">
                       <option>Escolha</option>
                       <option>Professor em tempo integral</option>
                       <option>Professor em tempo parcial</option>
                       <option>Horista</option>
                   </select>
                  </div>
                 
                   
             <div class="table-responsive" style="position:relative;width:50%;margin:0 auto;top:100px;">
             <table cellpadding="10" border="1" style="position:relative;margin:0 auto;" id="TabelaAjax" class="table table-striped">
            <thead id="CabeçalhoDaTable">
                <tr><th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Selecionar</th>
                </tr>
            </thead>
            <tbody id="CorpoDaTable">
              {{-- @if($Tabelas!=null) --}}
              {{-- @foreach($Tabelas as $coluna) --}}
              <tr>
                <form action="{{ route('GerenciarProfessor') }}">{{-- form para enviar ID para controller e view de GerenciarProfessor e assim listar todos os dados --}}
                <td scope="col" id="Indentificador">1</td>
                <td scope="col">Ian</td>
                <td scope="col">111.111.111-11</td>
                <td scope="col"><button type="submit" class="btn btn-info" >Visualizar:Ian</button></td>
                </form>
              </tr>
               
            </tbody>
        </table>
                <p id="P"></p>             
         
                       <!-- https://laravel.com/docs/5.6/blade#if-statements -->
                      
</section>
<script> 
{{-- $("#Tabela").hide();   --}}
$("#Cargo").hide(); 
$("#Botao").hide(); 
</script>
   </body>
</html>

