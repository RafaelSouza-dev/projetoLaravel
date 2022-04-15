@extends('templates.main')
@section('title', 'Entrega protocolo')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocoloentregue/searchEntrega.css">
@section('content')

    @if (session('msgSucesso'))
    <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
    <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <h1>Buscar pelo paciente</h1>
    <div class="containerPesquisa">
        <fieldset class="border">
            <legend class="legend"></legend>
            @auth
            <form id="search" action="/protocoloentregue/show" method="GET">
                @csrf
                <div class="PesquisarCpf">
                    <div class="input-group">
                        <input type="text" class="form-control col-5" name="pesquisarPaciente" id="inputPesquisarCpf" placeholder="Pesquisar pelo CPF do paciente" maxlength="11"required>
                    </div>
                </div>

                <!--<div class="listar">
                    <div class="input-group">
                        <button type="submit" id="listarPacientes" class="btn btn-outline-warning">
                            <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todos
                        </button>
                    </div>
                </div>-->
                <div class="input-group">
                    <button class="btn btn-success" type="submit" id="buttonPesquisar">
                        <ion-icon name="search-outline"></ion-icon> Pesquisar
                    </button>
                </div>
            </form>
            @endauth
        </fieldset>
    </div><br>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/protocoloentrega/searchEntrega.js"></script>


@endsection
