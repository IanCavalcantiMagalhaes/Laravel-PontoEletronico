<script>
  
    
<!DOCTYPE html>

<html ng-app="cdg">
    <head> <link href="css/MeuCss.css" rel="stylesheet">
       <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <script src="{{ asset('assets/js/MeuJs/Test.js') }}"></script> 
       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
       <link rel="stylesheet" href="{{ asset('assets/img/MeuCss.css') }}">
       <link rel="stylesheet" href="{{ asset('assets/css/MeuCss.css') }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>img{
    width: 150px;
    height: 200px;  
}</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
<body ng-controller="test"> 
    
<div ng-repeat="pessoa in pessoas">
    <p>{{-- pessoa.nome --}}</p>
</div>
      
      <p>{{ $S }}</p>
     
      <h1>Sample Application</h1>
      
      <div ng-app = "" ng-init = "countries = [{locale:'en-US',name:'United States'}, {locale:'en-GB',name:'United Kingdom'}, {locale:'en-FR',name:'France'}]"> 
         <p>Enter your Name: <input type = "text" ng-model = "name"></p>
         <p>Hello <span ng-bind = "name"></span>!</p>
         <p>List of Countries with locale:</p>
      
         <ol>
            <li ng-repeat = "country in countries">
               @{{ 'Country: ' + country.name + ', Locale: ' + country.locale }}{{-- https://pt.stackoverflow.com/questions/176548/incompatibilidade-entre-blade-e-angular-js-no-laravel-5 --}}
            </li>
         </ol>
      </div>
    

      <div ng-app="myApp" ng-controller="myCtrl">

            <h1 ng-mousemove=" count = count + 1 ">Mouse Over Me!</h1>
            
            <h2>@{{ count }}</h2>
            
            </div>
            <div>@{{ band }}</div>
          
              <select class="js-example-basic-single" name="Usuario" id="UsuarioSelecionado" onchange="Alert()">//funçao do onchange pegar dados de usuario selecionado e listar em um form
                <option value="">Ian</option>
                <option value="">Fulano</option>
              </select>
            <button onclick="Alert()"></button>
   </body>
</html>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
function Alert(){
    alert("OOOO");
}
</script>