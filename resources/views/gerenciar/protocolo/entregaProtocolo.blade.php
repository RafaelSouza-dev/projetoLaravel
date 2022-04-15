@extends('templates.main')
@section('title', 'Entregar Documento')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocolo/entregaProtocolo.css">

@section('content')

    <h1>Entregar Documento para <span class="azul">{{$pacientes->nome_paciente}}</span></h1>
    <form action="/protocolo/entrega/{{$pacientes->id_paciente}}" method="POST">
        @csrf
        <div class="boxCampos">
            <h3>Documento</h3>
            <div class="form-group" id="cpfInvisivel">
                <input type="text" class="form-control" name="cpf_paciente" value="{{$pacientes->cpf_paciente}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="tipoDocumento">Tipo de documento <span class="azul">*</span></label>
                    <select class="form-control" name="tipo_documento" id="" required>
                        <option value="">Selecione</option>
                        <option value="entrega de resultado de exame">Entrega de resultado de exame</option>
                        <option value="entrega de marcacao de consulta">Entrega de marcação de consulta</option>
                        <option value="entrega de marcacao de exame">Entrega de marcação de exame</option>
                        <option value="para a Regulacao">Para a Regulação</option>
                        <option value="documento perdido">Documento perdido</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="documento">O documento <span class="azul">*</span></label>
                    <select class="form-control" name="id_protocolo" id="" required>
                        <option value="">Selecione</option>
                        @foreach ($protocolo as $p )
                            <option  value="{{$p->id_protocolo}}">{{$p->documento}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_entrega">Data da entrega<span class="azul">*</span> </label>
                    <input type="date" name="data_entrega" class="form-control" required>
                </div>
            </div><br>

            <h3>Pessoa de confiança</h3>
            <div class="form-group" id="entregar">
                <label for="pessoa_confianca">Vai ser entregue a uma pessoa de confiança?</label><br>
                <input name="entrega_pessoa_confianca" type="radio" id="radioSim" value="sim">Sim
                <input name="entrega_pessoa_confianca" type="radio" id="radioNao" value="nao">Não
            </div>

            <div class="form-row" id="boxPessoaConfianca">
                <div class="form-group col-md-5">
                    <label for="">Nome de quem vai levar: <span class="azul">*</span></label>
                    <input class="form-control" name="nome_pessoa_confianca" id="nome_pessoa_confianca" type="text" required>
                </div>
                <div class="form-group col-md-3">
                    <label>RG:</label>
                    <input type="text" name="rg_pessoa_confianca" id="rg_pessoa_confianca" class="form-control" maxlength="9">
                </div>
                <div class="form-group col-md-3">
                    <label>CPF: <span class="azul">*</span></label>
                    <input type="text" name="cpf_pessoa_confianca" id="cpf_pessoa_confianca" class="form-control" maxlength="11" required>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
        </div>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/protocolo/entregaProtocolo.js"></script>
@endsection
