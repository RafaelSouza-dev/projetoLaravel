@extends('templates.main')
@section('title', 'Cadastrar Documentos')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/protocolo/createDocumento.css">

@section('content')

    <h1>Cadastrar Documento</h1>
    <form action="/protocolo" class="formulario" method="POST">
        @csrf

        <div class="boxCampos">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="descricaoDocumento">Descrição do documento: <span class="azul">*</span></label>
                    <input type="text" name="documento" id="descricaoDocumento" placeholder="cardiologista" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipodocumento">Tipo de documento: <span class="azul">*</span></label>
                    <select name="tipo_documento" id="tipoDocumento" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="entrega de resultado de exame">Entrega de resultado de exame</option>
                        <option value="entrega de marcacao de consulta">Entrega de marcação de consulta</option>
                        <option value="entrega de marcacao de exame">Entrega de marcação de exame</option>
                        <option value="para a Regulacao">Para a Regulação</option>
                        <option value="documento perdido">Documento perdido</option>
                    </select>
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
    </form>

@endsection
