@extends('templates.main')
@section('title', 'Mostrar paciente')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/show.css">

@section('content')

    {{ $pacientes->links() }}
    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <!-- parte de pesquisar pacientes -->
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form id="pesquisarPacientes" action="../pacientes/show" method="GET">
                    @csrf
                    <div id="PesquisarNomeCpf">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarPaciente" id="inputPesquisarNome"
                                placeholder="Pesquisar por nome" required>
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
                                    <input type="radio" name="pesquisaPorNomeCpf" value="pesquisaPorNomeCpf"
                                        id="radioPesquisaNome">Nome
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="pesquisaPorNomeCpf" value="pesquisaPorNomeCpf"
                                        id="radioPesquisaCpf">CPF
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




        <!-- dados dos pacientes que vem do banco -->
        @foreach ($pacientes as $p1)
            <div id="box">
                <div id="camposDaEsquerda">
                    <div class="form-group">
                        <span id="campoDestaque"><strong>{{ $p1->nome_paciente }}</strong></span>
                    </div>
                    <div class="form-group">
                        Microarea : <span>{{ $p1->microarea->numero_microarea }}</span>
                    </div>
                    <div class="form-group">
                        SUS :<span> {{ $p1->sus }}</span>
                    </div>
                    <div class="form-group">
                        Nome da mãe :<span> {{ $p1->nome_mae_paciente }}</span>
                    </div>
                    <div class="form-group">
                        Nome do pai :<span> {{ $p1->nome_pai_paciente }}</span>
                    </div>
                    <div class="form-group">
                        CPF:<span> {{$p1->cpf_paciente}}</span>
                    </div>
                    <div class="form-group">
                        RG: <span> {{$p1->rg_paciente}}</span>
                    </div>
                    <div class="form-group">
                        Nascimento :<span> {{ date('d/m/y', strtotime($p1->datanascimento_paciente)) }}</span>
                    </div>
                    <div class="form-group">
                        Comorbidades :<span>
                            @foreach ($p1->comorbidades as $comorbidade)
                                {{ $comorbidade }},
                            @endforeach
                        </span>
                    </div>
                </div>


                <div id="camposDoMeio">
                    <div class="form-group">
                        Sexo :<span> {{ $p1->sexo_paciente }}</span>
                    </div>
                    <div class="form-group">
                        Cidade :<span> {{ $p1->endereco->cidade }}</span>
                    </div>
                    <div class="form-group">
                        Bairro :<span> {{ $p1->endereco->bairro }}</span>
                    </div>
                    <div class="form-group">
                        UF: <span> {{$p1->endereco->uf}}</span>
                    </div>
                    <div class="form-group">
                        Rua: <span> {{$p1->endereco->rua}}</span>
                    </div>
                    <div class="form-group">
                        Número: <span>{{$p1->endereco->numero}}</span>
                    </div>
                    <fieldset class="border">
                        <legend class="legend"></legend>
                        <div class="form-group" id="acoesRapidas">
                            <label for="Ações rápidas">Ações rápidas</label>
                            <a href="/covid/create/{{$p1->id_paciente}}" class="btn-covid" id="covid">COVID 19</a>
                            <a href="/protocolo/entrega/{{$p1->id_paciente}}" class="btn-covid" id="covid">Protocolo</a>
                        </div>
                    </fieldset>
                </div>

                <div id="camposDaDireita">
                    <div class="form-group">
                        Complemento:
                            @if ($p1->endereco->complemento == '')
                            <span> sem complemento</span>
                            @else
                                <span>{{$p1->endereco->complemento}}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        Celular: <span>
                            @foreach ($p1->contato as $celular)
                                {{$celular->contato}}
                            @endforeach
                        </span>
                    </div>
                    <div class="form-group">
                        Residencial: <span>
                            @foreach ($p1->contato as $celular)
                                {{$celular->residencial}}
                            @endforeach
                            <span>
                    </div>
                    <div class="form-group">
                        <a href="/pacientes/edit/{{ $p1->id_paciente }}" id="editar" class="btn btn-editar">
                            <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$p1->nome_paciente}}">
                            <ion-icon id="icons" name="trash-bin-outline"></ion-icon>Deletar</button>
                    </div>
                </div>

                <!-- Modal de exclusão -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                            </div>
                            <div class="modal-body">
                                Confirmar exclusão?
                            </div>
                            <div class="form-group">
                                <div class="modal-footer">
                                    <form action="/pacientes/{{$p1->id_paciente}}" method="POST">
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

            </div>
        @endforeach
    </fieldset>
    <br>
    <!-- fim da parte dos dados dos pacientes que vem do banco -->



    {{ $pacientes->links() }}


    @if (count($pacientes) == 0 && $pesquisarPaciente)
        <p>Não foi possível encontrar nenhum paciente com o nome : <strong>{{ $pesquisarPaciente }}</strong></p>
    @elseif (count($pacientes)== 0 && $pesquisarCpf)
        <p>Não foi possível encontrar nenhum paciente com o CPF : <strong>{{ $pesquisarCpf }}</strong></p>
    @elseif (count($pacientes)== 0)
        <p>Não há pacientes cadastrados!</p>

    @endif

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/show.js"></script>
@endsection
