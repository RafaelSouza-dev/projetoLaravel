@extends('templates.main')
@section('title', 'COVID')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/covid/searchCovid.css">

@section('content')

    <h1>COVID</h1>
    <div class="containerPesquisa">
        <fieldset class="border">
            <legend class="legend"></legend>
            @auth
            <form id="search" action="../covid/show" method="GET">
                @csrf
                <div id="PesquisarNomeCpf">
                    <div class="input-group">
                        <input type="text" class="form-control col-9" name="pesquisarPaciente" id="inputPesquisarNome"
                            placeholder="Pesquisar pelo nome do paciente" required>
                        <!--<a href="/pacientes/create" class="btn btn-primary" id="addPaciente">
                            <ion-icon id="icons" name="person-add-outline"></ion-icon> adicionar um novo paciente
                        </a>-->
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control col-5" name="pesquisarCpf" id="inputPesquisarCpf"
                            placeholder="Digite o CPF sem pontos e traço" maxlength="11" disabled required>

                        <fieldset class="border" id="checkbox">
                            <legend class="legend"></legend>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="pesquisaPorNomeCpf" value="pesquisaPorNomeCpf" id="radioPesquisaNome">Nome
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="pesquisaPorNomeCpf" value="pesquisaPorNomeCpf" id="radioPesquisaCpf">CPF
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="filtrar_e_listar">
                    <div class="input-group">
                        <button type="submit" id="listarPacientes" class="btn btn-outline-warning">
                            <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todos
                        </button>
                    </div>
                </div>
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
    <script src="../../js/covid/searchCovid.js"></script>
@endsection
