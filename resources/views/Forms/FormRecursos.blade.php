<table style="width:100%">
    <tr>
      <th><a href="{{ route('SelecionarRecurso',['aba'=>1]) }}">Recurso 1</a></th>
      <th><a href="{{ route('SelecionarRecurso',['aba'=>2]) }}">Recurso 2</a></th> 
      <th><a href="{{ route('SelecionarRecurso',['aba'=>3]) }}">Recurso 3</a></th>
    </tr>
    <tr>
      @if($aba="1")
      <td><form></form></td>
      @endif
      @if($aba="2")
      <td><form></form></td>
      @endif
      @if($aba="3")
      <td><form></form></td>
      @endif
    </tr>
  </table>