<?php $val ?>
<!DOCTYPE html>
<html>
    <head> 
</head>

<body>

<p>{{$Valor}}</p>

@foreach($Valor as $val)
<p>{{$val->nome}} </p>
@endforeach
    </body>
</html>
