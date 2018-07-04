@extends('Templates/TemplateNavBar')


@section('conteudo')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
               @if(session('AlertaAulaIrregularInvalido'))
               <div class="alert alert-danger" role="alert">
                  <strong>Atenção - </strong>{{ session('AlertaAulaIrregularInvalido') }}
                  </div>
               @endif
                <h1>Inserir aula irregular(Para ID: {{ $IdProfessor }})</h1>
                <form action="">
                  <input type="hidden" name="ID" val={{ $IdProfessor }}>
                  <spam style="position:absolute;right:60%;">
                    <p>Digite horas abaixo(Limite de 4 horas)</p>
                    <input type="text" name="Horas" id="Horas" placeholder="Horas Feitas">
                  </spam>
                  <spam style="position:absolute;left:60%;">
                    <p>Digite o motivo da aula irregular</p>
                    <textarea rows="4" cols="30" >
                    </textarea>
                  </spam>
                    <button type="submit" style="position:absolute;left:40%;bottom:80%;">Inserir</button>
                </form>
                

</section>

</body>
</html>

@endsection
<script>
  $("#Horas").mask("0:00");

</script>