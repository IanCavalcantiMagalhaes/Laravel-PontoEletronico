
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="{{ URL::to('js/MeuJs.js') }}"></script>
<html><meta charset="utf-8"/>
<head><link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/CadastrarProfessor.js"></script>

<title>Adicionar produto a lista</title>

</head>
<body class="TelaDeFundo">
    
@foreach( $categories as $category )
 
    <img src="{{ url("categories/{$category->image}") }}" >
@endforeach
</body>
</html>

