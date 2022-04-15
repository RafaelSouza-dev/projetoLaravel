@extends('templates.main')
@section('title', 'Editando entrega')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocoloentregue/editEntrega.css">

@section('content')

    <form action="/protocoloentregue/update/{{$dados->id_entrega}}" method="POST">
        @csrf
        @method('put')
        <div class="boxCampos">
            <h3>Documento</h3>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="documento">O documento <span class="azul">*</span></label>
                    <select class="form-control" name="id_protocolo_fk" id="" required>
                        @foreach ($dados->protocolos as $p )
                            <option>{{$p->documento}}</option>
                        @endforeach

                        <!-- pegando os nomes dos protocolos cadastrados -->
                        @foreach ($protocolo as $p )
                            <option  value="{{$p->id_protocolo}}">{{$p->documento}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="tipoDocumento">Tipo de documento <span class="azul">*</span></label>
                    <select class="form-control" name="tipo_documento" id="" required>
                        <option value="{{$dados->tipo_documento}}" selected>{{$dados->tipo_documento}}</option>
                        <option value="entrega de resultado de exame">Entrega de resultado de exame</option>
                        <option value="entrega de marcacao de consulta">Entrega de marcação de consulta</option>
                        <option value="entrega de marcacao de exame">Entrega de marcação de exame</option>
                        <option value="para a Regulacao">Para a Regulação</option>
                        <option value="documento perdido">Documento perdido</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_entrega">Data da entrega<span class="azul">*</span> </label>
                    <input type="date" name="data_entrega" class="form-control" value="{{$dados->data_entrega}}" required>
                </div>
            </div><br>

            <h3>Pessoa de confiança</h3>
            <div class="form-group" id="entregar">
                <label for="pessoa_confianca">Vai ser entregue a uma pessoa de confiança?</label><br>
                <input name="entrega_pessoa_confianca" type="radio" id="radioSim" value="sim" required>Sim
                <input name="entrega_pessoa_confianca" type="radio" id="radioNao" value="nao">Não
            </div>

            <div class="form-row" id="boxPessoaConfianca">
                <div class="form-group col-md-5">
                    <label for="">Nome de quem vai levar: <span class="azul">*</span></label>
                    <input class="form-control" name="nome_pessoa_confianca" id="nome_pessoa_confianca" type="text" value="{{$dados->nome_pessoa_confianca}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>RG:</label>
                    <input type="text" name="rg_pessoa_confianca" id="rg_pessoa_confianca" class="form-control" value="{{$dados->rg_pessoa_confianca}}" maxlength="9">
                </div>
                <div class="form-group col-md-3">
                    <label>CPF: <span class="azul">*</span></label>
                    <input type="text" name="cpf_pessoa_confianca" id="cpf_pessoa_confianca" class="form-control" value="{{$dados->cpf_pessoa_confianca}}" maxlength="11" required>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
        </div>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/protocoloentrega/editEntrega.js"></script>
@endsection
