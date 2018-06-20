

    @if($RSTitulos)
    <table style="width:100%">
        <tr>
          <th>$ResultTitulo[0]</th>
          <th>$ResultTitulo[1]</th> 
          <th>$ResultTitulo[2]</th>
        </tr>
        @foreach($Result as $Coluna)
        <tr>
          <td>$Coluna->id</td>
          <td>$Coluna->nome</td> 
          <td>$Coluna->CPF</td>
        </tr>
        @endforeach
      </table>
    @endif
