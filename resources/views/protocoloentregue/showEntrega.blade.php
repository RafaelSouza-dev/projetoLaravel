@extends('templates.main')
@section('title', 'Entrega')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocoloentregue/showEntrega.css">
@section('content')

    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <h1>Pesquisar dados da entrega</h1>
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            <div class="containerPesquisa">
                <form id="search" action="/protocoloentregue/show" method="GET">
                    @csrf
                    <div class="PesquisarCpf">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pesquisarPaciente" id="inputPesquisarCpf"
                                maxlength="11" placeholder="Pesquisar pelo CPF do paciente" required>
                        </div>
                    </div>

                    <!--<div class="listar">
                                <div class="input-group">
                                    <button type="submit" id="listarPacientes" class="btn btn-outline-warning">
                                        <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todos
                                    </button>
                                </div>
                            </div>-->
                    <div class="input-group">
                        <button class="btn btn-success" type="submit" id="buttonPesquisar">
                            <ion-icon name="search-outline"></ion-icon> Pesquisar
                        </button>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
        <!-- fim da pesquisa -->


        <!-- dados dos pacientes que vem do banco -->
        @foreach ($paciente as $p1)
            <div id="box">
                <div id="camposDaEsquerda">
                    <span id="campoDestaque"><strong>{{ $p1->nome_paciente }}</strong></span><br>
                    <span> CPF :{{ $p1->cpf_paciente }}</span>
                </div>
            </div>

            <div id="box2">
                @foreach ($p1->protocolos as $protocolo )

                    <div id="camposDoMeio">
                        @if ($protocolo->pivot->id_entrega !=0)

                            <div class="form-group">
                                <span>Data da entrega:</span><a href="#" data-toggle="modal"
                                data-target="#exampleModal{{ $protocolo->pivot->id_entrega }}"
                                data-whatever="">{{ date('d/m/y', strtotime($protocolo->pivot->data_entrega)) }}</a>

                                <button type="button" class="btn btn-outline-danger" id="btnDeletar" data-toggle="modal" data-target="#exampleModalExcluir"
                                    data-whatever="{{ date('d/m/y', strtotime($protocolo->pivot->data_entrega)) }}">
                                    <ion-icon id="icons" name="trash-bin-outline"></ion-icon>Deletar
                                </button>

                                <a href="/protocoloentregue/edit/{{ $protocolo->pivot->id_entrega }}" id="btnEditar" class="btn btn-outline-success">
                                    <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                                </a>
                            </div>
                        @else
                            <p>teste</p>
                        @endif
                    </div>

                     <!-- Modal dados -->
                    <div class="modal fade" id="exampleModal{{ $protocolo->pivot->id_entrega }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da entrega</h5>
                                    <button type="button" class="btn btn-danger" id="btnCancelarExclusao" data-dismiss="modal">
                                        <ion-icon name="close"></ion-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        Data da entrega:
                                        <strong><span>{{ date('d/m/y', strtotime($protocolo->pivot->data_entrega)) }}</span></strong>
                                    </div>

                                    <div class="form-group">
                                        Tipo do documento: <span> {{ $protocolo->pivot->tipo_documento }}
                                                <i>{{ $protocolo->documento }}</i>
                                            </span>
                                    </div>
                                    <div class="form-group">
                                        Foi entregue para alguém de confiança?
                                        <span>{{ $protocolo->pivot->entrega_pessoa_confianca }}</span>
                                    </div>

                                    <!-- condição -->
                                    @if ($protocolo->pivot->entrega_pessoa_confianca == 'sim')
                                        <div class="form-group">
                                            Nome da pessoa de confiança:
                                            <span>{{ $protocolo->pivot->nome_pessoa_confianca }}</span>
                                        </div>
                                        <div class="form-group">
                                            RG da pessoa de confiança:
                                            <span>{{ $protocolo->pivot->rg_pessoa_confianca == '' ? 'Não preenchido' : $protocolo->pivot->rg_pessoa_confianca }}</span>
                                        </div>
                                        <div class="form-group">
                                            CPF da pessoa de confiança: <span>{{ $protocolo->pivot->cpf_pessoa_confianca }}</span>
                                        </div>
                                    @else

                                    @endif
                                    <!-- fim condição -->

                                </div>
                                <div class="form-group">
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fim modal dados -->


                    <!-- Modal de exclusão -->
                    <div class="modal fade" id="exampleModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <form action="/protocoloentregue/{{ $protocolo->pivot->id_entrega }}" method="POST">
                                            @csrf
                                            <button type="button" class="btn btn-outline-danger" id="btnCancelarExclusao"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-outline-success">Confirmar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fim modal exclusão -->
                @endforeach
            </div>
        @endforeach

        <div class="form-group col-6">
            @if (count($paciente) == 0 && $pesquisarPaciente)
                <p>Não foi possível encontrar nenhum paciente com o CPF : <strong>{{ $pesquisarPaciente }}</strong></p>
            @elseif (count($paciente)== 0)
                <p>Não há pacientes cadastrados!</p>
            @endif
        </div>


        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <script src="../../js/protocoloentrega/showEntrega.js"></script>

    @endsection
