@extends('templates.main')
@section('title', 'Protocolo')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/protocolo/searchProtocolo.css">

@section('content')

    <h1>Buscar documentos que são entregues ao paciente</h1>
    <div class="containerPesquisa">
        <fieldset class="border">
            <legend class="legend">
                <!--<h1>Pesquisar Paciente</h1>-->
            </legend>

            @auth
                <form action="../protocolo/show" method="GET">
                    <!-- esse /show é a action show do Controller -->
                    @csrf
                    <!--<div id="PesquisarNomeTipo">-->
                    <div class="input-group">
                        <input type="text" class="form-control col-9" name="pesquisarProtocolo" id="inputPesquisarNome"
                            placeholder="Sangue, Preventivo ..." required>
                        <a href="/protocolo/create" class="btn btn-primary" id="addProtocolo">
                            <ion-icon id="icons" name="add-outline"></ion-icon> adicionar um novo documento
                        </a>
                    </div>
                    <!--</div>-->

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button type="submit" id="listarProtocolo" class="btn btn-outline-warning">
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
    </div>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/protocolo/searchProtocolo.js"></script>
@endsection
