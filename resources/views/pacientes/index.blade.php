@extends('templates.main')
@section('title','TCC com Laravel')
@section('titleEsf','ESF Santo Expedito')

<link rel="stylesheet" href="../css/index.css">
@section('content')

    @guest
    <div class="btnEh1Login">
        <h1 id="h1Login">Clínica da Família <span class="azul">Santo Expedito</span>.</h1>
        <li><a class="btn btn-outline-succsess" href="/login">Entrar</a></li>
        <li><a class="btn btn-outline-success" id="cadastrar" href="/register"><ion-icon id="icons" name="person-add-outline"></ion-icon>Não tem cadastro? Clique aqui!</a></li>
    </div>
    @endguest
    <div id="containerPesquisarPaciente">
        @auth
            <!--<h1>Pesquisar Paciente</h1>
            <form action="pacientes/show" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pesquisarPaciente" placeholder="Digite o nome ou CPF ..." aria-label="Recipient's username" aria-describedby="button-addon2" required>
                    <button type="submit" class="btn btn-outline-secondary" type="button" id="buttonPesquisar"><ion-icon name="search-outline"></ion-icon> Pesquisar</button>
                </div>
            </form>-->
        @endauth
    </div>


    <!--<div id="containerComorbidadePaciente" clas="col-md-12">
        <h2>pensar no que colcar aqui</h2>
        <p>sei lá</p>
        <div id="cards-container" class="row">

        </div>
    </div>-->
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>

    <footer>
        <p>Clinica São Expedito &copy - 2022</p>
   </footer>
@endsection
