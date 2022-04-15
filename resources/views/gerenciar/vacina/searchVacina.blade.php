@extends('templates.main')
@section('title', 'Vacina')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="/css/vacina/searchVaccine.css">
@section('content')

<h1>Buscar vacina</h1>
<div class="containerPesquisa">
    <fieldset class="border">
        @auth
            <form action="../vacina/show" method="GET">
                @csrf
                <div id="PesquisarNome">
                    <div class="input-group">
                        <input type="text" class="form-control col-9" name="pesquisarVacina" id="inputPesquisarNome"
                            placeholder="Digite o nome da vacina. Ex: Aztrazeneca, Pfizer..." required>
                        <a href="/vacina/create" class="btn btn-primary" id="addVacina">
                            <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova vacina
                        </a>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control col-5" name="pesquisarLote" id="inputPesquisarLote"
                            placeholder="Digite o lote" maxlength="20" disabled required>

                        <fieldset class="border" id="checkbox">
                            <legend class="legend"></legend>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="pesquisaPorNomeLote" value="pesquisaPorNomeLote"
                                    id="radioPesquisaNome">Nome
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="pesquisaPorNomeLote" value="pesquisaPorNomeLote"
                                    id="radioPesquisaLote">Lote
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="filtrar_e_listar">
                    <div class="input-group">
                        <button type="submit" id="listarVacinas" class="btn btn-outline-warning">
                            <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todas
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
<script src="../js/vacina/searchVacina.js"></script>
@endsection
