<script>
  
    
<!DOCTYPE html>

<html>
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
    </head>

<body ng-controller="test"> 
    
<div ng-repeat="pessoa in pessoas">
    <p>{{-- pessoa.nome --}}</p>
</div>
      
      <p>{{ $S }}</p>
      
    </body>
</html>
