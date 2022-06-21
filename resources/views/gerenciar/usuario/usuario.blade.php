@extends('templates.main')
@section('title', 'Microareas')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/usuario/showUsuario.css">

@section('content')

    <h1>Usuários</h1>

    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPrincipal">
            @foreach ($usuario as $u1)
                <span><strong>{{$u1->name}}</strong></span><br>
            @endforeach
        </div>
    </fieldset>

<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>

@endsection
