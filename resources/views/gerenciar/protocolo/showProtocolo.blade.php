@extends('templates.main')
@section('title', 'Mostrar Documento')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocolo/showProtocolo.css">

@section('content')

    {{ $protocolo->links() }}
    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <!-- parte de pesquisar documento -->
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form id="pesquisarProtocolo" action="../protocolo/show" method="GET">
                    @csrf
                    <div id="PesquisarNomeTipo">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarProtocolo" id="inputPesquisarNome"
                                placeholder="Pesquisar pelo nome do documento" required>
                            <a href="/protocolo/create" class="btn btn-primary" id="addDocumento">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar novo documento a ser entregue
                            </a>
                        </div>
                    </div>

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button id="listarProtocolo" type="submit" class="btn btn-outline-warning">
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
        @foreach ($protocolo as $p)
           <div id="box">
                <div id="camposDaEsquerda">
                    <div class="form-group">
                        <span id="campoDestaque"><strong>{{ $p->documento }}</strong></span>
                    </div>
                    <div class="form-group">
                        Tipo : <span>{{ $p->tipo_documento }}</span>
                    </div>
                </div>

                <div id="camposDaDireita">
                    <div class="form-group">
                        <a href="/protocolo/edit/{{ $p->id_protocolo }}" id="editar" class="btn btn-editar">
                            <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$p->documento}}">
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
                            <form action="/protocolo/{{$p->id_protocolo}}" method="POST">
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
    <br>
    <!-- fim da parte dos dados dos pacientes que vem do banco -->


    {{ $protocolo->links() }}


    @if (count($protocolo) == 0 && $pesquisarProtocolo)
        <p>Não foi possível encontrar nenhum protocolo com o nome : <strong>{{ $pesquisarProtocolo }}</strong></p>
    @elseif (count($protocolo)== 0 && $pesquisarLote)
        <p>Não foi possível encontrar nenhum tipo : <strong>{{ $pesquisarTipo }}</strong></p>
    @elseif (count($protocolo)== 0)
        <p>Não há documentos cadastrados!</p>

    @endif

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/protocolo/showProtocolo.js"></script>
@endsection
