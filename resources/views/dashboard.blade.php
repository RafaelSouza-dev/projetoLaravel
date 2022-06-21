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

                <style>
                    .containerPrincipal{
                        padding: 0px 100px 0px 100px;
                    }
                    .dados{

                    }
                    fieldset{
                        background-color: #fff;
                        border-radius: 5px;
                        padding: 0px 100px 18px 200px;
                    }
                    p{
                        /*color:#007bff;*/
                    }
                    i{
                        color: #28a745;
                    }
                </style>

                <div class="containerPrincipal">
                    <fieldset class="border">
                        <legend class="legend"></legend>
                        <div class="microarea">
                            <p class="text-gray-700 mt-8 text-2xl"><strong>Minha microarea</strong></p>
                            @foreach ($microarea as $m1)
                                @foreach ($m1->usuario as $microareausuario)
                                    @if (Auth::user()->id == $microareausuario->id)
                                       <span class="text-gray-700">{{$m1->numero_microarea}}</span>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </fieldset> <br>


                    <div class="pacientes">
                        <fieldset class="border">
                            <legend class="legend"></legend>
                            @php $count = 0 @endphp
                            <p class="text-gray-700 mt-8 text-2xl"><strong>Meus pacientes</strong></p>
                            <div class="dados">
                                @foreach ($microarea as $m1)
                                    @foreach ($m1->paciente as $pacienteMicroarea)
                                        @foreach ($m1->usuario as $usuarioMicroarea)
                                            @if ($usuarioMicroarea->id == Auth::user()->id)
                                                <span class="text-gray-700">{{$pacienteMicroarea->nome_paciente}},</span>
                                                @php $count = $count +1 @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                           <i> {{$count}} Pacientes no total</i>
                        </fieldset> <br>
                    </div>

                    <div class="ruas">
                        <fieldset class="border">
                            <legend class="legend"></legend>
                            @php $count = 0 @endphp
                            <p class="text-gray-700 mt-8 text-2xl"><strong>Minhas ruas</strong></p>
                            <div class="dados">
                                @foreach ($microarea as $m1)
                                    @foreach ($m1->rua as $ruaMicroarea)
                                        @foreach ($m1->usuario as $usuarioMicroarea)
                                            @if ($usuarioMicroarea->id == Auth::user()->id)
                                                <span class="text-gray-700">{{$ruaMicroarea->nome_rua}},</span>
                                                @php $count = $count +1 @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                            <i>{{$count}} Ruas no total</i>
                        </fieldset>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>

<div class="containerPrincipal">
    @yield('content2')
</div>
</x-app-layout>

