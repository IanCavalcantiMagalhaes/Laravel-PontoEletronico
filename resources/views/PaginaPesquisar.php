
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<!DOCTYPE html>
<html><% ResultadoDePesquisa RP=new ResultadoDePesquisa(); ConectarBanco conecta=new ConectarBanco(); %>
    <head>  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/MeuCss.css" rel="stylesheet">
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Adicionar professor</a></li>
      <li><a href="#">Levantamento da semana</a></li>
      <li><a href="#">Pesquisar</a></li>
    </ul>
        <div class="col-sm-3 col-md-3 pull-right">
        <form class="navbar-form" role="search">
        <div class="input-group">
            
        </div>
        </form>
        </div>
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

