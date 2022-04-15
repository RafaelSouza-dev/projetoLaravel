@extends('templates.main')
@section('title', 'Rua')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="/css/rua/searchRua.css">
@section('content')

    <h1>Buscar rua</h1>
    <div class="containerPesquisa">
        <fieldset class="border">
            @auth
                <form action="/rua/show" method="GET">
                    @csrf
                    <div id="PesquisarNome">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarRua" id="inputPesquisarNome"
                                placeholder="Digite o nome da rua" required>
                            <a href="/rua/create" class="btn btn-primary" id="addRua">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova rua
                            </a>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-5" name="pesquisarCep" id="inputPesquisarCep"
                                placeholder="Digite o CEP sem pontos e traços" maxlength="20" disabled required>

                            <fieldset class="border" id="checkbox">
                                <legend class="legend"></legend>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="pesquisaPorNomeCep" value="pesquisaPorNomeCep"
                                        id="radioPesquisaNome">Nome
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="pesquisaPorNomeCep" value="pesquisaPorNomeCep"
                                        id="radioPesquisaCep">CEP
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button type="submit" id="listarRuas" class="btn btn-outline-warning">
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
    <script src="../../js/rua/searchRua.js"></script>
@endsection
