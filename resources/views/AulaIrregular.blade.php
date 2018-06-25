@extends('Templates/TemplateNavBar')


@section('conteudo')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

                <h1>Inserir aula irregular(Do ID: {{ $ID }})</h1>
                <form action="">
                  <input type="hidden" val={{ $ID }}>
                </form>
                

</section>

</body>
</html>

@endsection
