@extends('templates.main')
@section('title', 'Mostrar paciente')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/search.css">

@section('content')

@if (session('msgSucesso'))
    <p class="msgSucesso">{{session('msgSucesso')}}</p>
@endif

    <div class="containerPesquisa">
        <fieldset class="border">
            <legend class="legend">
                <!--<h1>Pesquisar Paciente</h1>-->
            </legend>

            @auth
                <form id="search" action="../pacientes/show" method="GET">
                    <!-- esse /show é a action show do Controller -->
                    @csrf
                    <div id="PesquisarNomeCpf">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarPaciente" id="inputPesquisarNome"
                                placeholder="Digite o nome do paciente" required>
                            <a href="/pacientes/create" class="btn btn-primary" id="addPaciente">
                                <ion-icon id="icons" name="person-add-outline"></ion-icon> adicionar um novo paciente
                            </a>
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
                            <!--<li class="nav-item dropdown" id="filtro">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownSituacaoPaciente" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Filtrar por
                                </a>
                                <ul class="dropdown-menu" id="dropFiltro" aria-labelledby="navbarDropdown">
                                    <li><a href="">
                                            <ion- name="bag-handle-outline">
                                                </ion-icon>Acamados
                                        </a></li>
                                    <li><a href="">
                                            <ion-icon name="calendar-outline"></ion-icon>Domiciliados
                                        </a></li>
                                    <li><a href="">
                                            <ion-icon name="calendar-outline"></ion-icon>Deficientes
                                        </a></li>
                                    <li><a href="">
                                            <ion-icon name="calendar-outline"></ion-icon>Gestantes
                                        </a></li>
                                    <li><a href="">
                                            <ion-icon name=""></ion-icon>COVID 19
                                        </a></li>
                                </ul>
                            </li>-->
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
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/search.js"></script>
@endsection
