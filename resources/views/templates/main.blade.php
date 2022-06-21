<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  fonts Google  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--  link css bootstrap -->
    <link rel="stylesheet" href="{{ url('assets/bootstrap-4.1.3/css/bootstrap.min.css') }}">

    <!-- link css da aplicação -->
    <link rel="stylesheet" href="../../css/main.css">

    <link rel="stylesheet" href="../css/index.css">


    <title>@yield('title')</title>
</head>

<body>
        <header>
            @auth
                <nav class="navbar navbar">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="../../img/sus-logo.png" alt="" width="45" height="25"
                                class="d-inline-block align-text-top">
                            @yield('titleEsf')
                        </a>
                        <ul>
                            <li><a href="/inicio"><strong>Início</strong></a></li>
                            <!--<li><a href="/pacientes/create">Cadastrar paciente</a></li>
                             <li><a href="/fechamento">Fechamento</a></li>-->
                            <li><a href="/pacientes/search">Pacientes</a></li>
                            <li><a href="/covid/search">COVID 19</a></li>
                            <li><a href="/protocoloentregue/search">Protocolo</a></li>
                            <!--<div class="dropdown" id="dropdownBeneficio">
                                <li><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                Benefícios
                                </a>
                                <ul class="dropdown-menu" id="dropdown-menu-beneficio" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/beneficio">Auxílio Brasil</a></li><br>
                                </ul>
                            </div>-->

                            <div class="dropdown" id="dropdownGerenciar">
                                <li><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                Gerenciar
                                </a>
                                <ul class="dropdown-menu" id="dropdown-menu-gerenciar" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/usuario/show">Usuários</a></li><br>
                                    <li><a class="dropdown-item" href="/vacina">Vacina</a></li><br>
                                    <li><a class="dropdown-item" href="/protocolo">Protocolo</a></li><br>
                                    <li><a class="dropdown-item" href="/microarea/search">Microarea</a></li><br>
                                    <li><a class="dropdown-item" href="/rua/search">Rua</a></li><br>
                                </ul>
                            </div>
                        </ul>
                        <div class="dashboard">
                            <li><a href="/dashboard" id="dashboard" role="button">Dashboard</a></li>
                        </div>
                    </div>
                </nav>
            @endauth
        </header>
    <div class="containerPrincipal">
        @yield('content')
    </div>
</body>
 <!-- js da aplicação -->

 <script src="../../js/jquery-3.4.1.min.js"></script>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
 <script src="../../js/bootstrap.min.js"></script>
 <script src="../../js/bootstrap.bundle.min.js"></script>
 <script src="../../js/main.js"></script>
</html>
