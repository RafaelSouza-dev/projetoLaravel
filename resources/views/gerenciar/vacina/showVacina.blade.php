@extends('templates.main')
@section('title', 'Mostrar vacina')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/vacina/showVacina.css">

@section('content')

    {{ $vacina->links() }}
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
                <form id="pesquisarVacina" action="../vacina/show" method="GET">
                    @csrf
                    <div id="PesquisarNomeLote">
                        <div class="input-group">
                            <input type="text" class="form-control col-9" name="pesquisarVacina" id="inputPesquisarNome"
                                placeholder="Pesquisar pelo nome da vacina" required>
                            <a href="/vacina/create" class="btn btn-primary" id="addVacina">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova vacina
                            </a>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-5" name="pesquisarLote" id="inputPesquisarLote"
                                placeholder="Digite o lote" maxlength="20" disabled required>

                            <fieldset class="border" id="checkbox">
                                <legend class="legend"></legend>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="pesquisaPorNomeLote" value="pesquisaPorNomeLote"
                                        id="radioPesquisaNome">Nome
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="pesquisaPorNomeLote" value="pesquisaPorNomeLote"
                                        id="radioPesquisaLote">Lote
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button id="listarVacinas" type="submit" class="btn btn-outline-warning">
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


        <!-- dados dos pacientes que vem do banco -->
        @foreach ($vacina as $v1)
            <div id="box">
                <div id="camposDaEsquerda">
                    <div class="form-group">
                        <span id="campoDestaque"><strong>{{ $v1->nome_vacina }}</strong></span>
                    </div>
                    <div class="form-group">
                        Lote : <span>{{ $v1->lote_vacina }}</span>
                    </div>
                    <div class="form-group">
                        Validade :<span> {{date('d/m/y', strtotime($v1->validade_vacina))}}</span>
                    </div>
                </div>

                <div id="camposDaDireita">
                    <div class="form-group">
                        <a href="/vacina/edit/{{ $v1->id_vacina }}" id="editar" class="btn btn-editar">
                            <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$v1->nome_vacina}}">
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
                                <form action="/vacina/{{$v1->id_vacina}}" method="POST">
                                    @csrf
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


    {{ $vacina->links() }}


    @if (count($vacina) == 0 && $pesquisarVacina)
        <p>Não foi possível encontrar nenhuma vacina com o nome : <strong>{{ $pesquisarVacina }}</strong></p>
    @elseif (count($vacina)== 0 && $pesquisarLote)
        <p>Não foi possível encontrar nenhuma vacina com o Lote : <strong>{{ $pesquisarLote }}</strong></p>
    @elseif (count($vacina)== 0)
        <p>Não há vacinas cadastradas!</p>

    @endif

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/vacina/showVacina.js"></script>
@endsection
