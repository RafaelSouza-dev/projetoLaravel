@extends('templates.main')
@section('title', 'Dados da entrega')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocoloentregue/showEntrega.css">
@section('content')

    @if (session('msgSucesso'))
        <p class="msgSucesso">{{ session('msgSucesso') }}</p>
    @elseif(session('msgFracasso'))
        <p class="msgFracasso">{{ session('msgFracasso') }}</p>
    @endif

    <fieldset class="border">
    <legend class="legend"></legend>
        <!-- dados dos pacientes que vem do banco -->
            <div id="box">
                <div id="camposDaEsquerda">
                        <div class="form-group">
                            Data da entrega: <strong><span>{{ date('d/m/y', strtotime( $dados->data_entrega)) }}</span></strong>
                        </div>

                        <div class="form-group">
                            Tipo do documento: <span>{{ $dados->tipo_documento }}  <i>{{ $dados->protocolos }}</i></span>
                        </div>
                        <div class="form-group">
                            Foi entregue para alguém de confiança? <span>{{ $dados->entrega_pessoa_confianca}}</span>
                        </div>
                        <!-- condição -->
                        @if ($dados->entrega_pessoa_confianca == 'sim')
                            <div class="form-group">
                                Nome da pessoa de confiança: <span>{{ $dados->nome_pessoa_confianca }}</span>
                            </div>
                            <div class="form-group">
                                RG da pessoa de confiança: <span>{{ $dados->rg_pessoa_confianca == '' ? 'Não preenchido' : $dados->rg_pessoa_confianca}}</span>
                            </div>
                            <div class="form-group">
                                CPF da pessoa de confiança: <span>{{ $dados->cpf_pessoa_confianca}}</span>
                            </div>
                        @else

                        @endif
                        <!-- fim condição -->
                </div>
            </div>
        <!-- fim dados vindps do banco -->
    </fieldset>



@endsection
