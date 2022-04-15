@extends('templates.main')
@section('title', 'Microareas')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/microarea/searchMicroarea.css">

@section('content')
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form action="../microarea/show" id="pesquisarMicroarea" method="GET">
                    @csrf
                    <div id="PesquisarNumero">
                        <div class="input-group">
                            <input type="text" class="form-control col-3" name="pesquisarMicroarea" id="inputPesquisarNumero"
                                placeholder="Digite o número da microarea." maxlength="3" required>
                            <a href="/microarea/create" class="btn btn-primary" id="addMicroarea">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova microarea
                            </a>
                        </div>
                    </div>

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button type="submit" id="listarMicroareas" class="btn btn-outline-warning">
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
        </div><br>
    </fieldset>

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/microarea/searchMicroarea.js"></script>

@endsection
