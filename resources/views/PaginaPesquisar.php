
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
        <title>JSP Page</title>

          <import href="newjavascript.js"/>
    </head>
    <body class="TelaDeFundo">

        <section class="Sessao">
                   <form action="RealizarPesquisaProfessor" class="c"  id="formato">
            <!--<input type="text" name="Campo" size="15" id="Campo" style="position: absolute; right: 55%;" placeholder="Digite nome ou id"/>
            <input type="submit" value="Search" style="position: absolute;margin-left:500px;" onclick=""/>-->
            <input type="text" placeholder="Insira um valor que queira pesquisar" name="campoPesquisa" style="position:relative;margin:0 auto;">
       
                <button class="btn btn-default" type="submit"<i class="glyphicon glyphicon-search"></i></button>
         
            <select name="" onchange="TrocarCampoDeTexto()" id="Selecionar" style="color:black;position: absolute;left: 15px; margin-top: 140px; position: absolute;" class="selectpicker">
                <option value="Selecione">Selecione</option>
                <option value="Nome">Nome</option>
                <option value="Id">Id</option>
                <option value="CPF">CPF</option>
            </select>
                 </form>



            <p style="color:white;position: absolute;left: 15px; margin-top: 55px; position: absolute;">Filtre o cargo</p>
                   <select name="Cargos" id="SeletorDePesquisa">
                       <option>Selecione um cargo</option>
                       <option>Professor em tempo integral</option>
                       <option>Horista</option>
                   </select>
                 
             <div class="table-responsive">
             <?php  if($Nomes===null){ ?>
             
             <p style="position: absolute;left:350px;color: white;">Insira um valor que queira pesquisar</p>
             <?php }else{?>
                              <table border="1" align="center" class="table" style="position: relative;width: 600px;left: 15px;">
                            <!-- column headers -->
                            <tr>


                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>ID</th>
                                    <th>Opçoes</th>
                                    <th></th>
                            </tr>
                            <!-- column data -->
                            <?php foreach($Nomes as $Nomes) {  ?>
                                     <tr>
                                    <?php ?>
                                    <form action="../">

                                        <td> <?php echo $Nomes->Nome;?></td>
                                        <td></td>
                                        <td></td>
                                        <td><select name="Escolha" id="Escolha_id">
                                         <option>Ler</option>
                                         <option>Editar</option>
                                        </select></td>
                                        <td><input type="submit" value="Visualizar" /></td>
                                        </form>
                               </tr>
                     

                        </table>
             <?php }} ?>
                        </div>  
                       <!-- https://laravel.com/docs/5.6/blade#if-statements -->
                      
</section>
   </body>
</html>
