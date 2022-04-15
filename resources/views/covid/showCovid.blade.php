@extends('templates.main')
@section('title', 'COVID')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/covid/showCovid.css">

@section('content')


    {{$pacientes->links()}}
    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <!-- parte de pesquisar covid -->
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form id="pesquisarPacientes" action="../covid/show" method="GET">
                    @csrf
                    <div id="PesquisarNomeCpf">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarPaciente" id="inputPesquisarNome"
                                placeholder="Pesquisar pelo nome do paciente" required>
                           <!--<a href="/protocolo/create" class="btn btn-primary" id="addDocumento">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar novo documento a ser entregue
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
                            <button id="listarPacientes" type="submit" class="btn btn-outline-warning">
                                <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todos
                            </button>
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-success" type="submit" id="buttonPesquisar" data-toggle="popover" title="teste"
                            data-content="Habilite um dos campos acima">
                            <ion-icon name="search-outline"></ion-icon> Pesquisar
                        </button>
                    </div>
                    <hr>
                </form>
            @endauth
        </div>
        <!-- fim da parte de pesquisar -->

        <!-- dados que vem do banco -->
        @foreach ($pacientes as $p1)
            <div id="box">
                <div class="camposDaEsquerda">
                    <div class="form-group">
                        <span id="campoDestaque"><strong>{{ $p1->nome_paciente }}</strong></span>
                    </div>
                    <div class="form-group">
                        CPF:<span> {{$p1->cpf_paciente}}</span>
                    </div>
                    <div class="form-group">
                        SUS :<span> {{ $p1->sus }}</span>
                    </div>
                    <div class="form-group">
                        Nome da mãe :<span> {{ $p1->nome_mae_paciente }}</span>
                    </div>
                    <div class="form-group">
                        Nascimento :<span> {{ date('d/m/y', strtotime($p1->datanascimento_paciente)) }}</span>
                    </div>
                </div><hr>

                <div class="camposDoMeio">
                    <div class="form-group">
                        Primeira dose: <span> {{$p1->primeira_dose}}</span>
                    </div>
                    <div class="form-group">
                        Segunda dose: <span>{{$p1->segunda_dose}}</span>
                    </div>
                    <div class="form-group">
                        Terceira dose: <span>{{$p1->terceira_dose}}<span>
                    </div>
                    <div class="form-group">
                        Já fez o teste de COVID?: <span>{{$p1->fez_teste}}<span>
                    </div>
                    <!-- condição-->
                    @if ($p1->fez_teste == 'sim')
                    <div class="resultado_dataTestagem">
                        <div class="form-group">
                            Resultado do teste: <span>{{$p1->resultado_teste}}<span>
                        </div>
                        <div class="form-group">
                            Data que fez o teste: <span>{{date('d/m/y', strtotime($p1->data_testagem))}}<span>
                        </div>
                    </div>
                    @else

                    @endif
                    <!-- fim condição-->
                </div>
                <div class="camposDaDireita">
                    <div class="form-group">
                        Sintomas: <span>{{$p1->sintomas}}<span>
                    </div>
                    <div class="form-group">
                        Celular: <span>{{$p1->celular}}<span>
                    </div>
                    <div class="form-group">
                        Residencial: <span>{{$p1->residencial == '' ? 'Não preenchido' : $p1->residencial }}<span>
                    </div>

                    <div class="form-group">
                        <a href="/covid/edit/{{$p1->id_covid}}" id="editar" class="btn btn-editar">
                            <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$p1->nome_paciente}}">
                            <ion-icon id="icons" name="trash-bin-outline"></ion-icon>Deletar</button>
                    </div>
                </div>
            </div>

            <!-- Modal de exclusão -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                        <button type="button" class="btn btn-danger" id="btnCancelarExclusao" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </button>
                    </div>
                    <div class="modal-body">
                        Confirmar exclusão?
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <form action="/covid/destroy/{{$p1->id_covid}}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-outline-danger" id="btnCancelarExclusao" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-success">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim modal -->

        @endforeach
    </fieldset>

    {{ $pacientes->links() }}


    @if (count($pacientes) == 0 && $pesquisarPaciente)
        <p>Não foi possível encontrar nenhum dado de COVID do(a) paciente : <strong>{{ $pesquisarPaciente }}</strong></p>
    @elseif (count($pacientes)== 0 && $pesquisarCpf)
        <p>Não foi possível encontrar nenhum dado de COVID do paciente com o CPF : <strong>{{ $pesquisarCpf }}</strong></p>
    @elseif (count($pacientes)== 0)
        <p>Não há dados cadastrados!</p>

    @endif
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/covid/showCovid.js"></script>
@endsection
