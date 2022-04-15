@extends('templates.main')
@section('title', 'Microareas')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/microarea/showMicroarea.css">

@section('content')

    <h1>Microareas</h1>

    {{ $microarea->links() }}
    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif
    <fieldset class="border">
        <legend class="legend"></legend>
        <div class="containerPesquisa">
            @auth
                <form action="../microarea/show" id="pesquisarMicroarea" method="GET">
                    @csrf
                    <div id="PesquisarNumero">
                        <div class="input-group">
                            <input type="text" class="form-control col-3" name="pesquisarMicroarea" id="inputPesquisarNumero"
                                placeholder="Digite o número da microarea." maxlength="3" required>
                            <a href="/microarea/create" class="btn btn-primary" id="addMicroarea">
                                <ion-icon id="icons" name="add-outline"></ion-icon> adicionar nova microarea
                            </a>
                        </div>
                    </div>

                    <div class="filtrar_e_listar">
                        <div class="input-group">
                            <button type="submit" id="listarMicroareas" class="btn btn-outline-warning">
                                <ion-icon id="icons" name="reader-outline"></ion-icon>Listar todas
                            </button>
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-success" type="submit" id="buttonPesquisar">
                            <ion-icon name="search-outline"></ion-icon> Pesquisar
                        </button>
                    </div>
                    <hr>
                </form>
            @endauth
        </div><br>


        <!-- dados que vem do banco-->
            @foreach ($microarea as $m1)
                <div class="containerDados">
                    <div id="box">
                        <div id="camposDaEsquerda">
                            <div class="form-group">
                                <span id="campoDestaque"><strong>Microarea {{ $m1->numero_microarea }}</strong></span>
                            </div>
                        </div>
                        <div id="camposDoMeio">
                            <div class="form-row">
                                <div class="form-group">
                                    <a href="/microarea/edit/{{ $m1->id_m_areas }}" id="editar" class="btn btn-editar">
                                        <ion-icon id="icons" name="create-outline"></ion-icon>Editar
                                    </a>
                                </div>
                                <!--<div class="form-group">
                                    <button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$m1->numero_microarea}}">
                                        <ion-icon id="icons" name="trash-bin-outline"></ion-icon>Deletar</button>
                                </div>-->
                            </div>
                        </div>
                    </div><hr>
                    <div class="subContainer">
                        <div class="form-group" id="ruas">
                            @foreach ($m1->rua as $rua )
                                <p style="text-align: center;">{{$rua->nome_rua}}</p>
                            @endforeach
                        </div>
                        <div class="form-group" id="countPacientes">
                            @php $count = 0 @endphp
                            @foreach ($m1->paciente as $pac)
                                @php $count = $count + 1 @endphp
                            @endforeach
                            {{$count}}
                            <span>Paciente(s) nessa microarea</span>
                        </div>
                    </div>
                </div>


                <!-- Modal ruas -->
                <div class="modal fade" id="modalRuas" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel"></h5><br>
                            </div>
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- fim modal -->

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
                                    <form action="/microarea/{{$m1->id_m_areas}}" method="POST">
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

     <!-- Offcanvas-
     <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Button with data-bs-target
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                </div>
            </div>
        </div>
         fim Offcanvas-->
    {{ $microarea->links() }}


    @if (count($microarea) == 0 && $pesquisarMicroarea)
        <p>Não foi possível encontrar nenhuma microarea de número : <strong>{{ $pesquisarMicroarea }}</strong></p>
    @elseif (count($microarea)== 0)
        <p>Não há microareas cadastradas!</p>

    @endif

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/microarea/showMicroarea.js"></script>

@endsection
