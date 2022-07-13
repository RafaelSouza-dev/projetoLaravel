<x-app-layout>

    @php /*<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Dashboard') }}
        </h2>
    </x-slot>*/
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />

                @if (session('msgSucesso'))
                    <p class="msgSucesso">{{ session('msgSucesso') }}</p>
                @elseif(session('msgFracasso'))
                    <p class="msgFracasso">{{ session('msgFracasso') }}</p>
                @endif

                <style>
                    .containerPrincipal{
                        padding: 0px 100px 0px 100px;
                    }
                    .microarea{
                        background-color: #f0efef;
                        border-radius: 5px;
                        width: 200px;
                        padding: 0px 2px 1px 5px;
                    }
                    fieldset{
                        background-color: #fff;
                        border-radius: 5px;
                        padding: 0px 100px 18px 200px;
                        box-shadow: 1px 3px 3px #E9E9E9;
                    }
                    span{
                        color:#5c5c5c;
                    }
                    span#usuario{
                        font-weight: bolder;
                        font-size: 30px;
                    }
                    i{
                        color: #28a745;
                    }
                    #botaoEditar{
                        color:#28a745;
                    }
                    #botaoEditar:hover{
                        background-color: #28a745;
                        border-radius:5px;
                        transition-duration: 0.2s;
                        padding: 8px 15px 8px 15px;
                        color:#fff;
                    }
                </style>

                <div class="containerPrincipal">
                    @if (Auth::User()->name == 'Administrador')<!-- condição para mostrar usuários somentte para adm--->
                        <fieldset class="border">
                            <legend class="legend"></legend>
                                <div class="usuarios"><br>
                                    @foreach ($usuario as $u1)
                                        <div class="form-group">
                                            <span class="mt-8 text-2xl" id="usuario">{{$u1->name}}</span>
                                            <div class="form-group">
                                                Email: <span>{{$u1->email}}</span>
                                            </div><br>
                                            <div class="form-group">
                                                <a href="/usuario/edit/{{ $u1->id }}" id="botaoEditar">Editar</a>
                                            </div>
                                            <div class="form-group">
                                                <!--<button type="button" class="btn btn-deletar" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$u1->name}}">Deletar</button>-->
                                            </div><br><hr><br>
                                        </div>
                                    @endforeach
                                </div>
                        </fieldset>
                    @else
                        <div class="microarea">
                            <p class=" mt-8 text-2xl"><strong>Minha microarea</strong></p>
                            @foreach ($microarea as $m1)
                                @foreach ($m1->usuario as $microareausuario)
                                    @if (Auth::user()->id == $microareausuario->id)
                                        <span class="text-2xl">{{$m1->numero_microarea}}</span>
                                    @endif
                                @endforeach
                            @endforeach
                        </div><br>


                        <fieldset class="border">
                            <legend class="legend"></legend>
                            <div class="pacientes">
                                @php $count = 0 @endphp
                                <p class="text-gray-700 mt-8 text-2xl"><strong>Meus pacientes</strong></p>
                                <div class="dados">
                                    @foreach ($microarea as $m1)
                                        @foreach ($m1->paciente as $pacienteMicroarea)
                                            @foreach ($m1->usuario as $usuarioMicroarea)
                                                @if ($usuarioMicroarea->id == Auth::user()->id)
                                                    <span>{{$pacienteMicroarea->nome_paciente}},</span>
                                                    @php $count = $count +1 @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>
                                <i> {{$count}} Pacientes no total</i><br>
                            </div><br><hr>

                            <div class="ruas">
                                @php $count = 0 @endphp
                                <p class="text-gray-700 mt-8 text-2xl"><strong>Minhas ruas</strong></p>
                                <div class="dados">
                                    @foreach ($microarea as $m1)
                                        @foreach ($m1->rua as $ruaMicroarea)
                                            @foreach ($m1->usuario as $usuarioMicroarea)
                                                @if ($usuarioMicroarea->id == Auth::user()->id)
                                                    <span>{{$ruaMicroarea->nome_rua}},</span>
                                                    @php $count = $count +1 @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>
                                <i>{{$count}} Ruas no total</i>
                            </div>
                        </fieldset>

                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>

<div class="containerPrincipal">
    @yield('content2')
</div>
</x-app-layout>

