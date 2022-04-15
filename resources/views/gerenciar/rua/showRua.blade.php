@extends('templates.main')
@section('title', 'Rua')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="/css/rua/showRua.css">
@section('content')

    <h1>Ruas</h1>

    {{ $rua->links() }}
    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <!-- parte de pesquisar vacina -->
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form id="pesquisarRua" action="../rua/show" method="GET">
                    @csrf
                    <div id="PesquisarNomeLote">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarRua" id="inputPesquisarNome"
                                placeholder="Pesquisar pelo nome da rua" required>
                            <a href="/rua/create" class="btn btn-primary" id="addRua">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova rua
                            </a>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-5" name="pesquisarCep" id="inputPesquisarCep"
                                placeholder="Digite o CEP" maxlength="8" disabled required>

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
                            <button id="listarRuas" type="submit" class="btn btn-outline-warning">
                                <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todas
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
        @foreach ($rua as $r1)
            <div id="box">
                <div id="camposDaEsquerda">
                    <div class="form-group">
                        <span id="campoDestaque"><strong>{{ $r1->nome_rua }}</strong></span>
                    </div>
                    <div class="form-group">
                        Bairro : <span>{{ $r1->nome_bairro }}</span>
                    </div>
                    <div class="form-group">
                        CEP :<span> {{ $r1->cep}}</span>
                    </div>
                    <div class="form-group">
                        Microarea :<span> {{ $r1->microarea->numero_microarea}}</span>
                    </div>
                </div>

                <div id="camposDaDireita">
                    <div class="form-group">
                        <a href="/rua/edit/{{ $r1->id_rua }}" id="editar" class="btn btn-editar">
                            <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$r1->nome_rua}}">
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
                                <form action="/rua/{{$r1->id_rua}}" method="POST">
                                    @csrf
                                    <!-- EXCLUINDO RUA ERRADA -->
                                    <button type="button" class="btn btn-outline-danger" id="btnCancelarExclusao" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-success">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- fim modal -->
    </fieldset>
    <br>
    <!-- fim da parte dos dados dos pacientes que vem do banco -->


    {{ $rua->links() }}


    @if (count($rua) == 0 && $pesquisarRua)
        <p>Não foi possível encontrar nenhuma rua com o nome : <strong>{{ $pesquisarRua }}</strong></p>
    @elseif (count($rua)== 0 && $pesquisarCep)
        <p>Não foi possível encontrar nenhuma rua com o CEP : <strong>{{ $pesquisarCep }}</strong></p>
    @elseif (count($rua)== 0)
        <p>Não há ruas cadastradas!</p>

    @endif

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/rua/showRua.js"></script>
@endsection
