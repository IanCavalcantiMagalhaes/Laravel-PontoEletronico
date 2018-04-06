
<!DOCTYPE html>
<html>
    <head> <link href="css/MeuCss.css" rel="stylesheet">
       <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <script src="js/MeuJs.js"></script>
       
   
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
</head>

<body> 
<select id="Sel">
<option value="Valor">Texto</option>
</select>

<div><h2>Let jQuery AJAX Change This Text</h2></div>
<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>



<button onclick="PegarDados()">Get External Content</button>

<input type="text" name="Cam" id="Campo" value=""/>

    </body>
</html>
